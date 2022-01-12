<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'ressource_id',
        'status',
        'reports',
        'replies_to'
    ];
}
