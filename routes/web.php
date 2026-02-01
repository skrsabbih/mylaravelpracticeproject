<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// user registration route get and post
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

// user login route get and post
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
// after login dashboard route


// admin dashboard and user management routes can be added in group route with middleware auth and role:admin

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/dashboard', fn() => view('auth.dashboard'))->name('dashboard');
    // admin permission crud routes
    Route::resource('permissions', PermissionController::class);
    // admin role crud routes
    Route::resource('roles', RoleController::class);
    // user management routes
    Route::resource('users', UserController::class);
});

// user logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
