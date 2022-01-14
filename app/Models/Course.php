<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Course (version anglaise) plutôt que Cours (version française) pour bien pouvoir faire la différence entre le pluriel et le singulier
 */
class Course extends Model
{
    use HasFactory;

    public $timestamps = false; // pas de timestamps sur les tables de contenus

    protected $fillable = [
        'file_uri',
        'file_name',
    ];

    /**
     * Récupérer la ressource associée
     */
    public function ressource() {

        return $this->morphOne(Ressource::class, 'ressourceable');
    }
}
