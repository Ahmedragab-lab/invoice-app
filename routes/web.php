<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


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
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/invoices', Controllers\InvoicesController::class);
Route::get('/section/{id}',[Controllers\InvoicesController::class ,'getproducts']);
Route::resource('/sections', Controllers\SectionsController::class);
Route::resource('/products', Controllers\ProductsController::class);
Route::get('/InvoicesDetails/{id}',[Controllers\InvoicesDetailsController::class ,'edit']);




//route used by form to open main sidebar 1
Route::get('/{page}', [Controllers\AdminController::class,'index']);
