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
    return view('welcome');
});

Route::resources([
    'brands' => BrandsController::class
]);

Route::resources([
    'categories' => CategoriesController::class
]);

Route::resources([
    'clients' => ClientsController::class
]);

Route::resources([
    'detailsincoming' => DetailsIncomingController::class
]);

Route::resources([
    'incomings' => IncomingsController::class
]);

Route::resources([
    'items' => ItemsController::class
]);

Route::resources([
    'notedetails' => NoteDetailsController::class
]);

Route::resources([
    'notesales' => NoteSalesController::class
]);

Route::resources([
    'suppliers' => SuppliersController::class
]);

Route::resources([
    'Users' => UsersController::class
]);
