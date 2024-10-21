<?php
namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class CheckJwtToken
{
    public function handle($request, Closure $next)
    {
        // Lista de rotas específicas que queremos tratar de forma especial
        $adminRoutes = ['admin', 'admin/dashboard', 'admin/users'];  // Rotas que requerem login
        $loginRoute = 'admin/login'; // Rota de login

        // Obtém o token do cookie
        $token = $_COOKIE['jwt_token'] ?? null;
        $userId = $_COOKIE['user_id'] ?? null;

        // Verifica se o usuário está tentando acessar a página de login
        if ($request->is($loginRoute)) {
            if (!is_null($token) && !is_null($userId)) {
                try {
                    // Tenta usar o token para autenticar o usuário
                    if ($user = JWTAuth::setToken($token)->authenticate()) {
                        // Se o usuário já está logado, redireciona para o painel de administração
                        return redirect('/admin');
                    }
                } catch (JWTException $e) {
                    // Se o token for inválido ou houver erro, permitir acesso à página de login
                    return $next($request);
                }
            }
        }

        // Verifica se o token está presente para rotas protegidas
        if (in_array($request->path(), $adminRoutes)) {
            if (is_null($token) || is_null($userId)) {
                return redirect('/admin/login');
            }

            try {
                // Tenta autenticar usando o token JWT
                if (!$user = JWTAuth::setToken($token)->authenticate()) {
                    return redirect('/admin/login');
                }
            } catch (JWTException $e) {
                return redirect('/admin/login');
            }

            // Verifica se o ID do cookie corresponde ao ID do usuário autenticado
            if ($user->id != $userId) {
                return redirect('/admin/login');
            }
        }

        // Continua o fluxo normal da requisição
        return $next($request);
    }
}
