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


Route::middleware('guest')->group(function () {
    Route::get('login',[\App\Http\Controllers\Admin\AuthController::class, 'showLoginFrom'])->name('login');
    Route::post('login_process',[\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});

Route::middleware('auth:admin')->group(function (){
    Route::resource('cars',\Admin\CarsController::class);
    Route::resource('users', \Admin\UsersController::class);
    Route::resource('admin_user', \Admin\AdminUserController::class);

    Route::get('logout',[\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    //Route::post('test',[\App\Http\Controllers\Admin\AuthController::class, 'test'])->name('test');
});
