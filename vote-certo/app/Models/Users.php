<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Users extends Authenticatable implements JWTSubject
{
    protected $fillable = ['name', 'email', 'password']; // Adicione os campos que você precisa

    public function getJWTIdentifier()
    {
        return $this->getKey(); // Retorna a chave primária do modelo
    }

    public function getJWTCustomClaims()
    {
        return []; // Retorna um array de reivindicações personalizadas, se necessário
    }

    public function getTTL()
    {
        return config('jwt.ttl'); // Retorna o TTL configurado
    }
}


