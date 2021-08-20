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
Route::get('edit_invoice/{id}',[Controllers\InvoicesController::class,'edit']);
Route::get('Status_show/{id}',[Controllers\InvoicesController::class,'show'])->name('Status_show');
Route::post('Status_Update/{id}',[Controllers\InvoicesController::class,'Status_Update'])->name('Status_Update');

Route::get('Invoice_Paid',[Controllers\InvoicesController::class,'Invoice_Paid']);
Route::get('Invoice_UnPaid',[Controllers\InvoicesController::class,'Invoice_UnPaid']);
Route::get('Invoice_Partial',[Controllers\InvoicesController::class,'Invoice_Partial']);

Route::resource('Archive', Controllers\InvoiceAchiveController::class);
Route::get('Print_invoice/{id}',[Controllers\InvoicesController::class,'Print_invoice']);
Route::get('export_invoices',[Controllers\InvoicesController::class,'export']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',Controllers\RoleController::class);
    Route::resource('users',Controllers\UserController::class);
    });


Route::get('invoices_report',[Controllers\Invoices_Report::class,'index']);
Route::post('Search_invoices',[Controllers\Invoices_Report::class,'Search_invoices']);
Route::get('customers_report',[Controllers\Customers_Report::class,'index'])->name("customers_report");
Route::post('Search_customers',[Controllers\Customers_Report::class,'Search_customers']);

// Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');
// Route::get('unreadNotifications_count', 'InvoicesController@unreadNotifications_count')->name('unreadNotifications_count');
// Route::get('unreadNotifications', 'InvoicesController@unreadNotifications')->name('unreadNotifications');



//route used by form to open main sidebar 1
Route::get('/{page}', [Controllers\AdminController::class,'index']);
