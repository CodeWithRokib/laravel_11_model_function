<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::resource('menus', MenuController::class);
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);

Route::middleware('role:admin,superadmin')->group(function () {
  
});