<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\front\OrderController as UserOrderController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Product;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard',[HomeController::class, 'home'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin']);

Route::get('category_list', [AdminController::class, 'view_category'])
    ->middleware(['auth', 'admin']);

Route::post('category_list', [AdminController::class, 'add_category'])
    ->middleware(['auth', 'admin']);

Route::get('delete_catgory/{category}', [AdminController::class, 'destroy_category'])
    ->middleware(['auth', 'admin']);

Route::get('catgory/{category}/edit', [AdminController::class, 'edit_category'])
    ->middleware(['auth', 'admin'])
    ->name('category_edit');

Route::patch('catgory/{category}', [AdminController::class, 'update_category'])
    ->middleware(['auth', 'admin'])
    ->name('category_update');



// for admin 
Route::resource('admin/products', ProductController::class);


// for front 
Route::resource('product', \App\Http\Controllers\front\ProductController::class)
    ->only('show');

// for front cart
Route::get('addtocart/{id}', [CartController::class, 'addToCart'])
    ->name('addCart')
    ->middleware(['auth']);

Route::resource('cart', CartController::class)
    ->only('index', 'destroy', 'store')
    ->middleware(['auth']);

// admin orders controller
// Route::resource('orders', OrderController::class)
//     ->only('index')
//     ->middleware(['auth', 'admin']);

Route::prefix('orders')->group(function(){
    Route::get('/',  [OrderController::class, 'index'])->name('orders.index');
    Route::get('/cancel/{order}',  [OrderController::class, 'orderCancel'])->name('orders.cancel');
    Route::get('/delivered/{order}',  [OrderController::class, 'orderDelivered'])->name('orders.delivered');
    Route::get('/pdf/{order}',  [OrderController::class, 'orderPdf'])->name('orders.pdf');
});


// fornt router
Route::prefix('dashboard/user')->group(function(){
    Route::get('orders', [UserOrderController::class, 'index'])->name('user.orders.index');
})->middleware(['auth']);

// payment gatway strip
Route::get('stripe/{total}', [StripePaymentController::class, 'stripe'])
    ->name('stripe.index');
Route::post('stripe/{amount}', [StripePaymentController::class, 'stripePost'])
    ->name('stripe.post');


Route::get('/test', function(){
    dd(Product::paginate(3));
});
