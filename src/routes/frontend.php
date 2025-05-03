<?php

use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(PageController::class)->prefix('')->group(function (){
    Route::get('/product-details/{slug?}','productDetails')->name('fproductDetails');

});

Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/cart-count', [CartController::class, 'cartCount']);


