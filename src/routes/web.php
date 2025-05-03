<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Response\ResponseController;
use App\Http\Controllers\Backend\DhashboardController;
use App\Http\Controllers\Backend\ActivityLogController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Route For Admin Dashboard
|--------------------------------------------------------------------------*/


Route::get('/administration', [DhashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::prefix('administration')->group(function () {
        //user
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/{user}/view', [UserController::class, 'view'])->name('users.view');
    });

    Route::controller(ProductController::class)->group(function (){
        Route::prefix('product')->group(function (){
            Route::get('/index','index')->name('product.index');
            Route::post('/store','store')->name('product.store');
            Route::get('/create','create')->name('product.create');
        });

    });


});


    // Response Controller
    Route::controller(ResponseController::class)
        ->prefix('/response')->group(function () {

    });




/*
|--------------------------------------------------------------------------
| End Demo Template
|--------------------------------------------------------------------------*/


require __DIR__ . '/auth.php';
