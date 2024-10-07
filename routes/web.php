<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckJwtToken;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web', CheckJwtToken::class]], function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    });
    Route::get('/admin/login', function () {
        return view('admin.login');
    });

});



