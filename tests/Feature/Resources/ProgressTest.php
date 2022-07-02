<?php

namespace Tests\Feature\Resources;

use Tests\TestCase;
use App\Models\User;
use App\Models\Ressource;

class ProgressTest extends TestCase
{
    public function test_user_can_favorite_a_resource() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get(route('resources.favorite', ['id' => $resource->id]));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_user_can_unfavorite_a_resource() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get(route('resources.favorite', ['id' => $resource->id]));
        $response->assertStatus(302);
        $response = $this->actingAs($user)->get(route('resources.favorite', ['id' => $resource->id]));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_user_can_save_a_resource() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get(route('resources.save', ['id' => $resource->id]));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_user_can_unsave_a_resource() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get(route('resources.save', ['id' => $resource->id]));
        $response->assertStatus(302);
        $response = $this->actingAs($user)->get(route('resources.save', ['id' => $resource->id]));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_user_can_use_a_resource() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get(route('resources.use', ['id' => $resource->id]));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_user_can_unuse_a_resource() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->get(route('resources.show', ['id' => $resource->id]));
        $response->assertStatus(302);

        $response = $this->actingAs($user)->get(route('resources.use', ['id' => $resource->id]));
        $response->assertStatus(302);
        $response = $this->actingAs($user)->get(route('resources.use', ['id' => $resource->id]));
        $response->assertStatus(302);

        $user->delete();
    }
}
