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
    Route::get('notesales/newsell/{tipo}', [NoteSalesController::class, 'newSell'])->name('notesales.venta')->middleware('auth');
});

Route::group([], function(){ //group for items
    Route::get('items', [ItemsController::class, 'index'])->name('items.index')->middleware('auth');
    Route::get('items/nuevo', function(){
        return view('items.nuevo');
    })->name('items.nuevo')->middleware('auth');
});

Route::group([], function(){ //group for clients
    Route::get('clients', [ClientsController::class, 'index'])->name('clients.index')->middleware('auth');
    Route::get('clients/nuevo', function(){
        return view('clients.nuevo');
    })->name('clients.nuevo')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('incomings', [IncomingsController::class, 'index'])->name('incomings.index')->middleware('auth');
    Route::get('incomings/nuevo', function(){
        return view('incomings.nuevo');
    })->name('incomings.nuevo')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('suppliers', [SuppliersController::class, 'index'])->name('suppliers.index')->middleware('auth');
    Route::get('suppliers/nuevo', function(){
        return view('suppliers.nuevo');
    })->name('suppliers.nuevo')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('brands', [BrandsController::class, 'index'])->name('brands.index')->middleware('auth');
    Route::get('brands/nuevo', function(){
        return view('brands.nuevo');
    })->name('brands.nuevo')->middleware('auth');
});

Route::group([], function(){ //group for incomings
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index')->middleware('auth');
    Route::get('categories/nuevo', function(){
        return view('categories.nuevo');
    })->name('categories.nuevo')->middleware('auth');
});
