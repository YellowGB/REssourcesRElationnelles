<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'relation',
        'user_id',
        'categorie_id',
        'status',
        'restriction',
        'content',
    ];
}
