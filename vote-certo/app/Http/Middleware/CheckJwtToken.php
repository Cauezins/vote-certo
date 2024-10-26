<?php
namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class CheckJwtToken
{
    public function handle($request, Closure $next)
    {
        // Lista de rotas específicas que queremos tratar de forma especial
        $adminRoutes = ['admin', 'admin/dashboard', 'admin/users'];  // Rotas que requerem login
        $loginRoute = 'admin/login'; // Rota de login

        // Obtém o token do cookie
        $token = $_COOKIE['user_token'] ?? null;

        // Verifica se o usuário está tentando acessar a página de login
        if ($request->is($loginRoute)) {
            if (!is_null($token)) {
                try {
                    // Tenta usar o token para autenticar o usuário
                    if (JWTAuth::setToken($token)->authenticate()) {
                        // Se o usuário já está logado, redireciona para o painel de administração

                            return redirect('/admin');

                    }else{
                            return redirect('/admin/login');
                    }
                } catch (JWTException $e) {
                    // Se o token for inválido ou houver erro, permitir acesso à página de login
                    return $next($request);
                }
            }
        }

        // Verifica se o token está presente para rotas protegidas
        if (in_array($request->path(), $adminRoutes)) {
            if (is_null($token)) {
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
        }

        // Continua o fluxo normal da requisição
        return $next($request);
    }
}
