<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DetailsIncomingController;
use App\Http\Controllers\IncomingsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\NoteDetailsController;
use App\Http\Controllers\NoteSalesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('/home');
});

Route::group([], function(){ //group for notesales
    Route::get('notesales', [NoteSalesController::class, 'index'])->name('notesales.index')->middleware('auth');
    Route::get('notesales/newsell/{tipo}', [NoteSalesController::class, 'create'])->name('notesales.create')->middleware('auth');
    Route::get('notesales/edit/{id}', [NoteSalesController::class, 'edit'])->name('notesales.edit')->middleware('auth');
    Route::get('notesales/show/{id}', [NoteSalesController::class, 'show'])->name('notesales.show')->middleware('auth');
});

Route::group([], function(){ //group for items
    Route::get('items', [ItemsController::class, 'index'])->name('items.index')->middleware('auth');
    Route::get('items/nuevo', [ItemsController::class, 'create'])->name('items.create')->middleware('auth');
    Route::get('items/destroy/{id}', [ItemsController::class, 'destroy'])->name('items.destroy')->middleware('auth');
    Route::post('items/store', [ItemsController::class, 'store'])->name('items.store')->middleware('auth');
});

Route::group([], function(){ //group for clients
    Route::get('clients', [ClientsController::class, 'index'])->name('clients.index')->middleware('auth');
    Route::get('clients/nuevo', [ClientsController::class, 'create'])->name('clients.create')->middleware('auth');
    Route::get('clients/destroy/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy')->middleware('auth');
    Route::get('clients/edit/{id}', [ClientsController::class, 'edit'])->name('clients.edit')->middleware('auth');
    Route::post('clients/store', [ClientsController::class, 'store'])->name('clients.store')->middleware('auth');
    Route::post('clients/update', [ClientsController::class, 'update'])->name('clients.update')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('incomings', [IncomingsController::class, 'index'])->name('incomings.index')->middleware('auth');
    Route::get('incomings/nuevo', [IncomingsController::class, 'create'])->name('incomings.create')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('suppliers', [SuppliersController::class, 'index'])->name('suppliers.index')->middleware('auth');
    Route::get('suppliers/nuevo', [SuppliersController::class, 'create'])->name('suppliers.create')->middleware('auth');
    Route::get('suppliers/destroy/{id}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy')->middleware('auth');
    Route::get('suppliers/edit/{id}', [SuppliersController::class, 'edit'])->name('suppliers.edit')->middleware('auth');
    Route::post('suppliers/store', [SuppliersController::class, 'store'])->name('suppliers.store')->middleware('auth');
    Route::post('suppliers/update', [SuppliersController::class, 'update'])->name('suppliers.update')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('brands', [BrandsController::class, 'index'])->name('brands.index')->middleware('auth');
    Route::get('brands/nuevo', [BrandsController::class, 'create'])->name('brands.create')->middleware('auth');
    Route::get('brands/destroy/{id}', [BrandsController::class, 'destroy'])->name('brands.destroy')->middleware('auth');
    Route::get('brands/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit')->middleware('auth');
    Route::post('brands/store', [BrandsController::class, 'store'])->name('brands.store')->middleware('auth');
    Route::post('brands/update', [BrandsController::class, 'update'])->name('brands.update')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index')->middleware('auth');
    Route::get('categories/nuevo', [CategoriesController::class, 'create'])->name('categories.create')->middleware('auth');
    Route::get('categories/destroy/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy')->middleware('auth');
    Route::post('categories/store', [CategoriesController::class, 'store'])->name('categories.store')->middleware('auth');
    Route::get('categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit')->middleware('auth');
    Route::post('categories/update', [CategoriesController::class, 'update'])->name('categories.update')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('settings', function(){
        return view('settings.settings');
    })->name('settings.index')->middleware('auth');
    Route::get('settings/pass', function(){
        return view('settings.changePass');
    })->name('settings.change.pass')->middleware('auth');
});
