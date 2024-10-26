<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckJwtToken;
use App\Http\Middleware\CheckPermissionAdmin;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ElectionsController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web', CheckJwtToken::class]], function () {
    Route::get('/admin', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('/admin/dashboard', function (DashboardController $dashboardController) {
        return $dashboardController->showView();
    });

    Route::group(['middleware' => ['web', CheckPermissionAdmin::class]], function () {
        Route::get('/admin/users', function (UsersController $userscontroller) {
            return $userscontroller->showView('users');
        });
    });

    Route::get('/admin/elections', function (ElectionsController $electionsController) {
        return $electionsController->showView('elections');
    });
    Route::get('/admin/election/{id}', function ($id, ElectionsController $electionsController) {
        return $electionsController->showView('election', $id);
    });


    Route::get('/admin/login', function () {
        return view('admin.login');
    });
});
