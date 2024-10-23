<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elections extends Model
{
    use HasFactory;

    // Permitir que os seguintes campos sejam preenchíveis
    protected $fillable = ['title', 'start_date', 'end_date', 'creator_id', 'category', 'public_results'];
}
