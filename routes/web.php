<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AdminController,
    UserController
};

Route::prefix('dashboard')->group(function () {

    Route::put('/users/{id}/update-photo', [UserController::class, 'uploadFile'])->name('users.update.image');
    Route::get('/users/{id}/image', [UserController::class, 'changeImage'])->name('users.change.image');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

});

Route::get('/', function () {
    return view('welcome');
});
