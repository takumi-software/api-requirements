<?php

use CodeHappy\App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('products', ProductController::class,)
        ->name('products.index');
});
