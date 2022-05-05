<?php

namespace App\Models;

use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'firstname',
        'email',
        'password',
        'postcode',
        'status',
        'role_id',
        'last_connexion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function commentaire() {
        return $this->hasMany(Commentaire::class);
    }

    public function preference() {
        return $this->hasOne(UserPreference::class);
    }

    public function progressions() {
        return $this->hasMany(Progression::class);
    }

    /**
     * Récupère une ou toutes les permissions d'un utilisateur
     * 
     * @return array<string,bool>|bool L'ensemble des permissions ou la permission demandée
     * 
     * @since 0.6.5-alpha
     */
    public static function getPermission(User $user, string $filter = 'all') {

        $permissions = json_decode($user->role->permissions, true);

        if ($filter !== 'all') return $permissions[$filter];
        return $permissions;
    }
}
