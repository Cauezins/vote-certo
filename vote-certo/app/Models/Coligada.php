<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coligada extends Model
{
    use HasFactory;

    // Permitir que os seguintes campos sejam preenchíveis
    protected $fillable = ['name', 'status', 'id_resp'];
}
