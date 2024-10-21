<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckJwtToken;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web', CheckJwtToken::class]], function () {
    Route::get('/admin', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('/admin/dashboard', function (UsersController $userscontroller) {
        return $userscontroller->showAdminView('dashboard');
    });
    Route::get('/admin/users', function (UsersController $userscontroller) {
        return $userscontroller->showAdminView('users');
    });
    Route::get('/admin/elections', function (UsersController $userscontroller) {
        return $userscontroller->showAdminView('elections');
    });


    Route::get('/admin/login', function () {
        return view('admin.login');
    });

});



