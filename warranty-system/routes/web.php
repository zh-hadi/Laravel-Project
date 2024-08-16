<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryInvoiceController;
use App\Http\Controllers\ImporterController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ReceiveInvoiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', fn()=> to_route('products.index'));




Route::resource('/register', RegisterController::class);
Route::resource('/login', LoginController::class)->except('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware('auth')->group(function(){
    Route::resource('/invoices', ReceiveInvoiceController::class);
    Route::get('/invoices/product/edit/{id}', [ReceiveInvoiceController::class, 'editProduct'])->name('invoices.product.edit');
    Route::resource('/invoicesd', DeliveryInvoiceController::class);
    Route::resource('/customers', CustomerController::class)->middleware('auth');
    Route::resource('/importers', ImporterController::class);
    Route::resource('/products', ProductController::class);
    Route::post('/products/addStore', [ProductController::class, 'storeData'])->name('products.storeData');
    Route::get('/delivery', [DeliveryController::class, 'delivery'])->name('products.delivery')->middleware('auth');
    Route::post('/delivery', [DeliveryController::class, 'deliveryAdd'])->name('products.deliveryAdd')->middleware('auth');
});

