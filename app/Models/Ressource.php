<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ressource extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'ressourceable_type',
        'ressourceable_id',
        'relation',
        'user_id',
        'categorie_id',
        'status',
        'restriction',
    ];

    /**
     * Récupérer le modèle de contenu (Activité, Jeu, Défi, etc.) en fonction du type
     */
    public function ressourceable() {

        return $this->morphTo();
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }
}
