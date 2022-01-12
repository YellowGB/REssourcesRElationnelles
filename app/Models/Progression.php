<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progression extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ressource_id',
        'is_favorite',
        'is_used',
        'is_saved',
    ];
}
