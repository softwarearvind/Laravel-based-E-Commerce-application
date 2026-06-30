<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrountedController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [FrountedController::class, 'index'])->name('home');
Route::get('/view-product/{name}', [FrountedController::class, 'viewProduct'])->name('view.product');

Route::middleware('auth')->group(function (){

 Route::post('/cart/add/{id}', [CartController::class,'add'])->name('cart.add');
  Route::get('/cart', [CartController::class,'index'])->name('cart.index');
 Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
 Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
  Route::get('/payment', [PaymentController::class, 'index'])->name('payment');



});



Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware();
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware();
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware();
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware();
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware();
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
