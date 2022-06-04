<?php

use App\Http\Controllers\Tenant\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Home Tenant';
});

Route::resource('/dash', TenantController::class);

