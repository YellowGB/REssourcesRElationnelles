<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'permissions',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    /**
     * Trouve un rôle dans la DB selon son nom
     * 
     * @param string $name le nom du rôle
     * 
     * @return int $id l'id du rôle dans la base de données
     */
    public static function findId($name) {

        $role = self::where('name', $name)->firstOrFail();

        return $role->id;
    }
}
