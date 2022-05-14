<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AdminController,
    CourseController,
    UserController,
    HomeController
};

Route::prefix('dashboard')->group(function () {



    /**
     * Routes Courses
     */
    Route::put('/courses/{id}/update-photo', [CourseController::class, 'uploadFile'])->name('courses.update.image');
    Route::get('/courses/{id}/image', [CourseController::class, 'changeImage'])->name('courses.change.image');
    Route::resource('/courses',  CourseController::class);


    /**
     * Routes Admins
     */
    Route::put('/admin/{id}/update-photo', [AdminController::class, 'uploadFile'])->name('admin.update.image');
    Route::get('/admin/{id}/image', [AdminController::class, 'changeImage'])->name('admin.change.image');
    Route::resource('/admin', AdminController::class);
    /**
     * Routes Users
     */
    Route::put('/users/{id}/update-photo', [UserController::class, 'uploadFile'])->name('users.update.image');
    Route::get('/users/{id}/image', [UserController::class, 'changeImage'])->name('users.change.image');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

});

Route::get('/', function () {
    return view('welcome');
});
