<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;

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