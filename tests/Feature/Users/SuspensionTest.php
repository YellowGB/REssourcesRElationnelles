<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Tests\TestCase;

class SuspensionTest extends TestCase
{
    public function test_administrator_can_access_citizen_administration() {

        $user = User::factory()->administrator()->create();

        $response = $this->actingAs($user)->get(route('citizens'));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_administrator_can_suspend_citizen() {

        $admin   = User::factory()->administrator()->create();
        $citizen = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($admin)->post(route('citizens.suspend'), [
            'id' => $citizen->id,
        ]);
        $response->assertStatus(302);

        $citizen->refresh();
        $this->assertTrue(! is_null($citizen->suspended_at));

        $admin->delete();
        $citizen->delete();
    }

    public function test_administrator_can_unsuspend_citizen() {

        $admin   = User::factory()->administrator()->create();
        $citizen = User::factory()->verifiedCitizen()->create(['suspended_at' => now()]);

        $response = $this->actingAs($admin)->post(route('citizens.suspend'), [
            'id' => $citizen->id,
        ]);
        $response->assertStatus(302);

        $citizen->refresh();
        $this->assertTrue(is_null($citizen->suspended_at));

        $admin->delete();
        $citizen->delete();
    }

    public function test_suspended_citizen_cannot_connect() {

        $user = User::factory()->verifiedCitizen()->create(['suspended_at' => now()]);

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'p@ssWORD1234',
        ]);
        $response->assertStatus(403);

        $user->delete();
    }
}
