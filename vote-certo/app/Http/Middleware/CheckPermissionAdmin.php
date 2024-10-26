<?php
namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckPermissionAdmin
{
    public function handle($request, Closure $next)
    {
        // Lista de rotas específicas que queremos tratar de forma especial
        $adminRoutes = ['admin/users' => '99;50'];  // Rotas que requerem login

        // Obtém o token do cookie
        $token = $_COOKIE['user_token'];
        $user = JWTAuth::setToken($token)->authenticate();

        if (is_null($user)) {
            return redirect('/admin/login');
        }

        // Verifica se o token está presente para rotas protegidas
        if (array_key_exists($request->path(), $adminRoutes)) {
            $position = explode(';', $adminRoutes[$request->path()]);
            if(!in_array($user->position, $position)){
                return redirect('/admin/dashboard');
            }
        }

        // Continua o fluxo normal da requisição
        return $next($request);
    }
}
