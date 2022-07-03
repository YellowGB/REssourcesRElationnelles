<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Ressource;
use App\Enums\RessourceStatus;

class ModerationTest extends TestCase
{
    public function test_moderator_can_access_moderation_dashboard() {

        $user = User::factory()->moderator()->create();

        $reponse = $this->actingAs($user)->get(route('catalogue.moderation'));
        $reponse->assertStatus(302);

        $user->delete();
    }

    public function test_citizen_cannot_access_moderation_dashboard() {

        $user = User::factory()->verifiedCitizen()->create();

        $reponse = $this->actingAs($user)->get(route('catalogue.moderation'));
        $reponse->assertStatus(302);

        $user->delete();
    }

    public function test_moderator_can_validate_a_resource() {

        $resource   = Ressource::factory()->create(['status' => RessourceStatus::Pending->value]);
        $user       = User::factory()->moderator()->create();

        $response = $this->actingAs($user)->post(route('resources.valider', $resource->id));
        $response->assertStatus(302);

        $resource->refresh();

        $this->assertTrue($resource->status == RessourceStatus::Published->value);

        $user->delete();
    }

    public function test_moderator_can_reject_a_resource() {

        $resource   = Ressource::factory()->create(['status' => RessourceStatus::Pending->value]);
        $user       = User::factory()->moderator()->create();

        $response = $this->actingAs($user)->post(route('resources.valider', $resource->id));
        $response->assertStatus(302);

        $resource->refresh();

        $this->assertTrue($resource->status == RessourceStatus::Published->value);

        $user->delete();
    }

    public function test_moderator_can_suspend_a_resource() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->moderator()->create();

        $response = $this->actingAs($user)->post(route('resources.suspendre', $resource->id));
        $response->assertStatus(302);

        $resource->refresh();

        $this->assertTrue($resource->status == RessourceStatus::Suspended->value);

        $user->delete();
    }

    public function test_moderator_can_access_a_pending_resource() {

        $resource   = Ressource::factory()->create(['status' => RessourceStatus::Pending->value]);
        $user       = User::factory()->moderator()->create();

        $response = $this->actingAs($user)->get(route('resources.show', $resource->id));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_citizen_cannot_access_a_pending_resource() {

        $resource   = Ressource::factory()->create(['status' => RessourceStatus::Pending->value]);
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->get(route('resources.show', $resource->id));
        $response->assertStatus(302);

        $user->delete();
    }
}
