<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebpayController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminController;

// Página principal
Route::get('/', [HomeController::class, 'index']);

Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');

// Carrito
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::post('/cart/increase/{id}', [CartController::class, 'increase']);
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index']);

// Pago Webpay
Route::get('/pay', [WebpayController::class, 'iniciarPago'])->name('webpay.pagar');

Route::match(['GET', 'POST'], '/webpay/respuesta', [WebpayController::class, 'respuesta'])
    ->name('webpay.respuesta');

Route::get('/clear-cart', function () {
    session()->forget('cart');
    return redirect('/cart');
});    

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products');

    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');

    Route::post('/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');

    Route::get('/products/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');

    Route::post('/products/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');

    Route::post('/products/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.products.delete');

});