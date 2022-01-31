<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // On crée la table
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->json('permissions');
            $table->timestamps();
        });

        // On récupère la liste des roles et des permissions
        $roles       = UserRole::cases();
        $permissions = Config::get('constants.permissions');

        // On ajoute les rôles par défaut dans la table avec les autorisations correspondantes
        foreach ($roles as $role) {
            // On crée le tableau préparant le json qui contiendra les permissions
            $arrayPermissions = $permissions;
            
            switch ($role) {
                case UserRole::SuperAdmin:
                    // le superadmin a tous les droits
                    foreach ($permissions as $kPermission => $vPermission) {
                        $arrayPermissions[$kPermission] = 1;
                    }
                    break;
                case UserRole::Admin:
                    // l'admin n'a pas le droit de supprimer définitivement un utilisateur
                    foreach ($permissions as $kPermission => $vPermission) {
                        $arrayPermissions[$kPermission] = 1;
                    }
                    $arrayPermissions['can_delete_users'] = 0;
                    break;
                case UserRole::Moderator:
                    $arrayPermissions['can_create_ressources'] = 1;
                    $arrayPermissions['can_publish_ressources'] = 1;
                    $arrayPermissions['can_update_ressources_self'] = 1;
                    $arrayPermissions['can_update_ressources_others'] = 1;
                    $arrayPermissions['can_delete_ressources_self'] = 1;
                    $arrayPermissions['can_delete_ressources_others'] = 1;
                    break;
                case UserRole::VerifCitizen:
                    $arrayPermissions['can_create_ressources'] = 1;
                    $arrayPermissions['can_update_ressources_self'] = 1;
                    $arrayPermissions['can_delete_ressources_self'] = 1;
                    break;
            }

            // On ajout le rôle avec ses permissions dans la table
            DB::table('roles')->insert([
                'name'          => $role,
                'permissions'   => json_encode($arrayPermissions),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
