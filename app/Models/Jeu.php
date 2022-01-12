<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    use HasFactory;

    public $timestamps = false; // pas de timestamps sur les tables de contenus

    protected $table    = 'jeux';
    protected $fillable = [
        'description',
        'starting_date',
        'link',
    ];
}
