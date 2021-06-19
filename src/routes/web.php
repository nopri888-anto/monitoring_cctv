<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WilayahController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
    });

    Route::middleware(['user'])->group(function () {
        Route::get('/user', [UserController::class, 'index']);
    });

    Route::get('/logout', function () {
        Auth::logout();
        redirect('auth/login');
    });
});

/* Route For User Admin*/
Route::get('admin/user/', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.user');
Route::get('user/create', [App\Http\Controllers\Admin\UsersController::class, 'create'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('user.update');
Route::get('user/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('user.delete');

/* Route For User wilayah*/
Route::get('admin/wilayah/', [App\Http\Controllers\Admin\WilayahController::class, 'index'])->name('admin.wilayah');
Route::get('wilayah/create', [App\Http\Controllers\Admin\WilayahController::class, 'create'])->name('wilayah.create');
Route::post('wilayah/store', [App\Http\Controllers\Admin\WilayahController::class, 'store'])->name('wilayah.store');
Route::get('wilayah/edit/{id}', [App\Http\Controllers\Admin\WilayahController::class, 'edit'])->name('wilayah.edit');
Route::post('wilayah/update/{id}', [App\Http\Controllers\Admin\WilayahController::class, 'update'])->name('wilayah.update');
Route::get('wilayah/delete/{id}', [App\Http\Controllers\Admin\WilayahController::class, 'destroy'])->name('wilayah.delete');