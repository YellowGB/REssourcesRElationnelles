<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @since 0.8.4-alpha scopeFilter()
 */
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

    public function scopeFilter($query, $params) {

        if (isset($params['ressourceable_type']) && trim($params['ressourceable_type'] !== '')) {
            $query->where('ressourceable_type', 'like', '%' . $params['ressourceable_type']);
            $query->orWhere('ressourceable_type', 'like', '%' . 'Activite');
        }

        if (isset($params['relation']) && trim($params['relation'] !== '')) {
            $query->where('relation', trim($params['relation']));
        }

        if (isset($params['categorie_id']) && $params['categorie_id'] !== '') {
            $query->where('categorie_id', $params['categorie_id']);
        }

        return $query;
    }
}
