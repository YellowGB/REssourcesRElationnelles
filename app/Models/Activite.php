<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    public $timestamps = false; // pas de timestamps sur les tables de contenus

    protected $fillable = [
        'description',
        'starting_date',
        'duration',
    ];
}
