<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionSetting extends Model
{
    use HasFactory;
    protected $table = 'election_setting';

    // Permitir que os seguintes campos sejam preenchíveis
    protected $fillable = ['category', 'public_results', 'election_id'];
}
