<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atelier extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false; // pas de timestamps sur les tables de contenus

    protected $fillable = [
        'description',
    ];

    /**
     * Récupérer la ressource associée
     */
    public function ressource() {

        return $this->morphOne(Ressource::class, 'ressourceable');
    }
}
