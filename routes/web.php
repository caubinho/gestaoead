<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AdminController
};

Route::prefix('dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
});

Route::get('/', function () {
    return view('welcome');
});
