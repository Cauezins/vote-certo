<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Controllers\ElectionsController;
use Tymon\JWTAuth\Facades\JWTAuth;

class DashboardController
{
    public function showView()
    {
        $token = $_COOKIE['user_token'];
        $user = JWTAuth::setToken($token)->authenticate();


        if ($user) {
            $dataElections = ElectionsController::getElectionsByPermission($user->id, $user->position);
            return view('admin.admin', ['view' => 'dashboard', 'user' => $user, 'dataElections' => $dataElections]);
        } else {
            // Caso não encontre o usuário, redireciona ou retorna um erro
            return redirect('/admin/login');
        }
    }
}
