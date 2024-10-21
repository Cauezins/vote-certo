<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ElectionsUsersController;
use App\Http\Controllers\ElectionsController;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);



//Route Admin


Route::middleware('auth:api')->post('/admin', [UsersController::class, 'store']); // Create new item
Route::get('/admin/{id}', [UsersController::class, 'show']); // Update the item
Route::put('/admin/{id}', [UsersController::class, 'update']); // Update the item
Route::post('/admin/login', [UsersController::class, 'login']); // Login
Route::delete('/admin/{id}', [UsersController::class, 'destroy']); // Delete an item

//Route Coligada

Route::middleware('auth:admin')->get('/coligada', [ElectionsController::class, 'index']);

Route::post('/coligada', [ElectionsController::class, 'store']); // Create New Coligada
Route::put('/coligada/{id}', [ElectionsController::class, 'update']); // Update Coligada
Route::delete('/coligada/{id}', [ElectionsController::class, 'destroy']); // Delete an item

//Route User
Route::get('/user', [ElectionsUsersController::class, 'index']); // List All Users
Route::post('/user', [ElectionsUsersController::class, 'store']); // Create New Coligada
Route::put('/user/{id}', [ElectionsUsersController::class, 'update']); // Update Coligada
Route::delete('/user/{id}', [ElectionsUsersController::class, 'destroy']); // Delete an item
