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
        'count',
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

        if (isset($params['ressourceable_type']) && isset($params['ressourceable_type'][0])) {

            // On initialise la recherche avec le premier type
            $query->where('ressourceable_type', 'like', '%' . $params['ressourceable_type'][0]);
            
            // S'il y a plus d'un type
            if (count($params['ressourceable_type']) > 1) {
                for ($i = 1; $i < count($params['ressourceable_type']); $i++) {
                    $query->orWhere('ressourceable_type', 'like', '%' . $params['ressourceable_type'][$i]);
                }
            }
        }

        if (isset($params['relation']) && trim($params['relation'] !== '')) {
            $query->where('relation', trim($params['relation']));
        }

        if (isset($params['categorie_id']) && $params['categorie_id'] !== '') {
            $query->where('categorie_id', $params['categorie_id']);
        }

        return $query;
    }

    /**
     * Incrémente le nombre de visite d'une ressource à chaque consultation (statistiques)
     * @since 1.4.0-alpha
     */
    public function incrementVisitsCount() {
        $this->count++;
        $this->update();
    }
}
