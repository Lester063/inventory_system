<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReStockController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('item', 'App\Http\Controllers\ItemController');
Route::resource('sales', 'App\Http\Controllers\SalesController');
Route::resource('suppliers','App\Http\Controllers\SupplierController');
Route::resource('restock','App\Http\Controllers\ReStockController');



Route::get('restockska/{id}', [ReStockController::class, 'restockska'])->name('restockska.id');
