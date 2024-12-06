<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminLoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('users')->group(function () {
    Route::group(['middleware'=> "guest"],function(){
    # Routes for users pages
    Route::get('/login', [UserLoginController::class, 'login'])->name('users.login');
    Route::get('/register', [UserLoginController::class, 'register'])->name('users.register');
    Route::post('/authenticate', [UserLoginController::class, 'authenticate'])->name('users.authenticate');
    Route::post('/processRegister', [UserLoginController::class, 'processRegister'])->name('users.processRegister');
    });
    Route::group(['middleware'=> "auth"],function(){
    Route::get('/dashboard', [UserLoginController::class, 'dashboard'])->name('users.dashboard');
    Route::get('/logout', [UserLoginController::class, 'logout'])->name('users.logout');

    });
});

# Routes for admin
Route::prefix('admin')->group(function () {

    # Guest Middleware for admin login
    Route::group(['middleware'=> "admin.guest"],function(){
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    # Auth Middleware for admin dashboard
    Route::group(['middleware'=> "admin.auth"],function(){
        Route::get('dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
