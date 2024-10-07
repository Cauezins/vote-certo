<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColigadaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);



//Route Admin


Route::post('/admin', [AdminController::class, 'store']); // Create new item
Route::put('/admin/{id}', [AdminController::class, 'update']); // Update the item
Route::post('/admin/login', [AdminController::class, 'login']); // Login
Route::delete('/admin/{id}', [AdminController::class, 'destroy']); // Delete an item

//Route Coligada

Route::middleware('auth:admin')->get('/coligada', [ColigadaController::class, 'index']);

Route::post('/coligada', [ColigadaController::class, 'store']); // Create New Coligada
Route::put('/coligada/{id}', [ColigadaController::class, 'update']); // Update Coligada
Route::delete('/coligada/{id}', [ColigadaController::class, 'destroy']); // Delete an item

//Route User
Route::get('/user', [UserController::class, 'index']); // List All Users
Route::post('/user', [UserController::class, 'store']); // Create New Coligada
Route::put('/user/{id}', [UserController::class, 'update']); // Update Coligada
Route::delete('/user/{id}', [UserController::class, 'destroy']); // Delete an item
