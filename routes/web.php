<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// product index page
Route::get('/', [FrontendProductController::class, 'index'])->name('home');
// product details page
Route::get('/product/details/{product}', [FrontendProductController::class, 'show'])->name('product.show');
// cart for this product route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// cart for this product route
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
// remove cart for this product route
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
// user registration route get and post
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

// user login route get and post
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

// user forgot password route get and post
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordStore'])->name('forgot-password.store');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPasswordStore'])->name('password.update');

// admin dashboard and user management routes can be added in group route with middleware auth

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/dashboard', fn() => view('auth.dashboard'))->name('dashboard');
    // admin permission crud routes
    Route::resource('permissions', PermissionController::class);
    // admin role crud routes
    Route::resource('roles', RoleController::class);
    // user management routes
    Route::resource('users', UserController::class);
    // user profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // student management routes
    Route::resource('students', StudentController::class);
    // category management routes
    Route::resource('categories', CategoryController::class);
    // product management routes
    Route::resource('products', ProductController::class);
});

// user logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
