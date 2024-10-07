<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Permitir que os seguintes campos sejam preenchíveis
    protected $fillable = ['name', 'email', 'cpf', 'nascimento', 'id_coligada'];
}
