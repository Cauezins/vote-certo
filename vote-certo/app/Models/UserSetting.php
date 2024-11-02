<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;
    protected $table = 'user_setting';

    // Permitir que os seguintes campos sejam preenchíveis
    protected $fillable = ['user_id', 'max_create_election'];
}
