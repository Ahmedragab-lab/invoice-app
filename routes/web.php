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
    return view('welcome2');
});

Auth::routes();
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/invoices', Controllers\InvoicesController::class);
Route::get('/section/{id}',[Controllers\InvoicesController::class ,'getproducts']);
Route::resource('/sections', Controllers\SectionsController::class);
Route::resource('/products', Controllers\ProductsController::class);
Route::get('/InvoicesDetails/{id}',[Controllers\InvoicesDetailsController::class ,'edit']);
Route::post('/InvoiceAttachments',[Controllers\InvoiceAttachmentsController::class ,'store']);
Route::get('View_file/{invoice_number}/{file_name}',[Controllers\InvoicesDetailsController::class ,'open_file']);
Route::get('download/{invoice_number}/{file_name}',[Controllers\InvoicesDetailsController::class ,'get_file']);
Route::post('delete_file',[Controllers\InvoicesDetailsController::class ,'destroy'])->name('delete_file');




//route used by form to open main sidebar 1
Route::get('/{page}', [Controllers\AdminController::class,'index']);
