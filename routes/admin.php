<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::resource('reports', ReportController::class)->only(['store', 'show']);
