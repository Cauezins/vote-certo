<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Controllers\ElectionsController;

class DashboardController
{
    public function showView()
    {
        $id = $_COOKIE['user_id'];
        $user = Users::find($id);  // Busca o usuário pelo ID


        if ($user) {
            $dataElections = ElectionsController::getElectionsByPermission($user->id, $user->position);
            return view('admin.admin', ['view' => 'dashboard', 'user' => $user, 'dataElections' => $dataElections]);
        } else {
            // Caso não encontre o usuário, redireciona ou retorna um erro
            return redirect('/admin/login');
        }
    }
}
