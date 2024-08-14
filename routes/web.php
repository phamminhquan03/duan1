<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Home;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', function () {
    return view('Home.index');
});

Route::resource('products', ProductController::class);

// Category routes
Route::get('categorys', [ProductController::class, 'Cateindex'])->name('categorys.index');
Route::get('categorys/create', [ProductController::class, 'Catecreate'])->name('categorys.create');
Route::post('categorys', [ProductController::class, 'Catestore'])->name('categorys.store');
Route::get('categorys/{category}/edit', [ProductController::class, 'Catedit'])->name('categorys.edit');
Route::put('categorys/{category}', [ProductController::class, 'Cateupdate'])->name('categorys.update');
Route::delete('categorys/{category}', [ProductController::class, 'Catedestroy'])->name('categorys.destroy');

Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');

Route::resource('orders', OrderController::class);
// Banner routes
Route::resource('banner', BannerController::class);
Route::get('checkout', [OrderController::class, 'checkoutindex'])->name('checkout');
Route::delete('orders/{id}/deleteProduct', [OrderController::class, 'deleteProduct'])->name('orders.deleteProduct');
Route::delete('/orders/{order}/items/{item}', [OrderController::class, 'destroy'])->name('orderItems.destroy');
Route::delete('orders/{id}/deletecheckout', [OrderController::class, 'checkoutdestroy'])->name('checkoutdestroy');
// Home routes
Route::get('/', [Home::class, 'index'])->name('Home.index');
Route::get('home/show/{id}', [Home::class, 'show'])->name('Home.show');
Route::patch('/orders/{order}/approve', [OrderController::class, 'approve'])->name('orders.approve');



Route::resource('user', UserController::class);

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [Home::class, 'index'])->name('Home.index');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', [ProductController::class, 'index'])->name('products.index');
    });
});
Route::get('orders/{id}/payment', [OrderController::class, 'showPaymentForm'])->name('orders.showPaymentForm');

// Route xử lý thanh toán
Route::post('orders/{id}/payment', [OrderController::class, 'processPayment'])->name('orders.processPayment');

// This is to add default auth routes provided by laravel/ui
Auth::routes();

