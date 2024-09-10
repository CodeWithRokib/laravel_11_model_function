<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class);
Route::resource('menus', MenuController::class);
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);

Route::middleware('role:admin,superadmin')->group(function () {
  
});