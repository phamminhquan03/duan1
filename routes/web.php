<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('categorys', [ProductController::class, 'Cateindex'])->name('categorys.index');
Route::get('categorys/create', [ProductController::class, 'Catecreate'])->name('categorys.create');
Route::post('categorys', [ProductController::class, 'Catestore'])->name('categorys.store');
Route::get('categorys/{category}/edit', [ProductController::class, 'Catedit'])->name('categorys.edit');
Route::put('categorys/{category}', [ProductController::class, 'Cateupdate'])->name('categorys.update');
Route::delete('categorys/{category}', [ProductController::class, 'Catedestroy'])->name('categorys.destroy');

Route::resource('banner', BannerController::class);




Route::get('home', [Home::class, 'index'])->name('Home.index');
Route::get('home/show/{id}', [Home::class, 'show'])->name('Home.show');
 Route::get('login', [UserController::class, 'index'])->name('login.index');
 Route::post('login', [UserController::class, 'show'])->name('login.show');
 Route::get('logout', [UserController::class, 'logout'])->name('logout');


