=<?php

use App\Http\Controllers\Api\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductsController::class, 'index']);
