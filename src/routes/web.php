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

/* Route For Admin wilayah*/
Route::get('admin/wilayah/', [App\Http\Controllers\Admin\WilayahController::class, 'index'])->name('admin.wilayah');
Route::get('wilayah/create', [App\Http\Controllers\Admin\WilayahController::class, 'create'])->name('wilayah.create');
Route::post('wilayah/store', [App\Http\Controllers\Admin\WilayahController::class, 'store'])->name('wilayah.store');
Route::get('wilayah/edit/{id}', [App\Http\Controllers\Admin\WilayahController::class, 'edit'])->name('wilayah.edit');
Route::post('wilayah/update/{id}', [App\Http\Controllers\Admin\WilayahController::class, 'update'])->name('wilayah.update');
Route::get('wilayah/delete/{id}', [App\Http\Controllers\Admin\WilayahController::class, 'destroy'])->name('wilayah.delete');

/* Route For Admin wilayah*/
Route::get('admin/cabang/', [App\Http\Controllers\Admin\CabangController::class, 'index'])->name('admin.cabang');
Route::get('cabang/create', [App\Http\Controllers\Admin\CabangController::class, 'create'])->name('cabang.create');
Route::post('cabang/store', [App\Http\Controllers\Admin\CabangController::class, 'store'])->name('cabang.store');
Route::get('cabang/edit/{id}', [App\Http\Controllers\Admin\CabangController::class, 'edit'])->name('cabang.edit');
Route::post('cabang/update/{id}', [App\Http\Controllers\Admin\CabangController::class, 'update'])->name('cabang.update');
Route::get('cabang/delete/{id}', [App\Http\Controllers\Admin\CabangController::class, 'destroy'])->name('cabang.delete');

/* Route For Admin outlet*/
Route::get('admin/outlet/', [App\Http\Controllers\Admin\OutletController::class, 'index'])->name('admin.outlet');
Route::get('outlet/create', [App\Http\Controllers\Admin\OutletController::class, 'create'])->name('outlet.create');
Route::post('outlet/store', [App\Http\Controllers\Admin\OutletController::class, 'store'])->name('outlet.store');
Route::get('outlet/edit/{id}', [App\Http\Controllers\Admin\OutletController::class, 'edit'])->name('outlet.edit');
Route::post('outlet/update/{id}', [App\Http\Controllers\Admin\OutletController::class, 'update'])->name('outlet.update');
Route::get('outlet/delete/{id}', [App\Http\Controllers\Admin\OutletController::class, 'destroy'])->name('outlet.delete');

/* Route For Admin penilaian*/
Route::get('admin/category/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');

Route::get('admin/parameter/', [App\Http\Controllers\Admin\ParameterController::class, 'index'])->name('admin.parameter');
Route::get('parameter/create', [App\Http\Controllers\Admin\ParameterController::class, 'create'])->name('parameter.create');
Route::post('parameter/store', [App\Http\Controllers\Admin\ParameterController::class, 'store'])->name('parameter.store');
Route::get('parameter/edit/{id}', [App\Http\Controllers\Admin\ParameterController::class, 'edit'])->name('parameter.edit');
Route::post('parameter/update/{id}', [App\Http\Controllers\Admin\ParameterController::class, 'update'])->name('parameter.update');
Route::get('parameter/delete/{id}', [App\Http\Controllers\Admin\ParameterController::class, 'destroy'])->name('parameter.delete');