<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class,'index'])->name('home');

Route::get('/cars', [\App\Http\Controllers\CarsController::class, 'index'])->name('cars_index');
Route::get('/cars/{id}', [\App\Http\Controllers\CarsController::class, 'show'])->name('car_show');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name("logout");
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name("login");
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name("login_process");

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name("register");
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name("register_process");

    Route::get('/password_recover', [\App\Http\Controllers\AuthController::class, 'showPasswordRecoverForm'])->name("password_recover");
    Route::post('/password_recover_process', [\App\Http\Controllers\AuthController::class, 'PasswordRecover'])->name("password_recover_process");
});


