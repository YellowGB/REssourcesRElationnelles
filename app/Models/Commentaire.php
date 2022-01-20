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

    public function ressources() {
        return $this->belongsTo(Ressource::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
