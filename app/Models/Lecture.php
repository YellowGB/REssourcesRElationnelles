<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    public $timestamps = false; // pas de timestamps sur les tables de contenus

    protected $fillable = [
        'title',
        'author',
        'year',
        'summary',
        'analysis',
        'review',
    ];

    /**
     * Récupérer la ressource associée
     */
    public function ressource() {

        return $this->morphOne(Ressource::class, 'ressourceable');
    }
}
