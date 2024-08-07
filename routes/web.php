<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\FoodSizeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('layouts','backend.layouts.app');

Route::resource('users', UserController::class);
Route::get('users_datatable', [UserController::class, 'activityDatatable'])->name('users_datatable');
Route::post('/user/email', [UserController::class, 'emailCheck']);

Route::resource('admins', AdminController::class);
Route::get('admins_datatable', [AdminController::class, 'activityDatatable'])->name('admins_datatable');
Route::post('/admin/email', [AdminController::class, 'emailCheck']);


Route::resource('restaurants', RestaurantController::class);
Route::get('restaurants_datatable', [RestaurantController::class, 'activityDatatable'])->name('restaurants_datatable');
Route::get('food_items_datatable/{restaurant_id}', [RestaurantController::class, 'activityFoodItemDatatable'])->name('food_items_datatable');



Route::resource('food_sizes', FoodSizeController::class);
Route::get('food_sizes_datatable', [FoodSizeController::class, 'activityDatatable'])->name('food_sizes_datatable');