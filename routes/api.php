<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

Route::name('api.')
    ->group(function () {
        Route::apiResource('products', ProductController::class)->only(['index', 'show']);
    });
