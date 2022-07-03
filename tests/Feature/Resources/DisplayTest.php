<?php

namespace Tests\Feature\Resources;

use App\Models\Commentaire;
use Tests\TestCase;
use App\Models\User;
use App\Models\Ressource;

class DisplayTest extends TestCase
{
    public function test_can_display_catalogue() {

        $response = $this->get(route('catalogue'));

        $response->assertStatus(302);
    }

    public function test_can_display_resource() {

        $resource = Ressource::factory()->create();

        $response = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);
    }

    public function test_citizen_can_access_his_private_resource() {

        $user       = User::factory()->verifiedCitizen()->create();
        $resource   = Ressource::factory()->create([
            'user_id'       => $user->id,
            'restriction'   => 'private',
        ]);

        $response   = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);
    }

    public function test_citizen_cannot_access_anothers_private_resource() {

        $resource   = Ressource::factory()->create(['restriction' => 'private']);
        $user       = User::factory()->verifiedCitizen()->create();

        $response   = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);

        $user->delete();
    }
}
