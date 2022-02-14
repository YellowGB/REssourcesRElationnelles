<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ressource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progression extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'ressource_id',
        'is_favorite',
        'is_used',
        'is_saved',
    ];

    public function ressource(){
        return $this->belongsTo(Ressource::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
