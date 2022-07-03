<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;

class ProfileTest extends TestCase
{
    public function test_user_can_access_his_profile_page() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->get(route('profile'));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_user_can_update_his_name() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'name' => 'Testname',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->name === 'Testname');

        $user->delete();
    }

    public function test_user_can_update_his_firstname() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'firstname' => 'Testfirstname',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->firstname === 'Testfirstname');

        $user->delete();
    }

    public function test_user_can_update_his_nickname() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'nickname' => 'Testnickname',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->nickname === 'Testnickname');

        $user->delete();
    }

    public function test_user_can_remove_his_nickname() {

        $user = User::factory()->verifiedCitizen()->create(['nickname' => 'Testnickname']);

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'nickname' => '',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->nickname == '');

        $user->delete();
    }

    public function test_user_can_update_his_email() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'email' => 'email@test.test',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->email === 'email@test.test');

        $user->delete();
    }

    public function test_user_cannot_change_his_email_to_an_already_used_email() {

        $used  = User::factory()->verifiedCitizen()->create(['email' => 'email@test.test']);
        $user  = User::factory()->verifiedCitizen()->create();
        $email = $user->email;

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'email' => 'email@test.test',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->email === $email);

        $user->delete();
        $used->delete();
    }

    public function test_user_can_update_his_description() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'description' => 'Testdescription',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->description === 'Testdescription');

        $user->delete();
    }

    public function test_user_can_remove_his_description() {

        $user = User::factory()->verifiedCitizen()->create(['description' => 'Testdescription']);

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'description' => '',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->description == '');

        $user->delete();
    }

    public function test_user_can_update_his_postcode() {

        $user = User::factory()->verifiedCitizen()->create(['postcode' => '69001']);

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'postcode' => '69100',
        ]);
        $response->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->postcode === '69100');

        $user->delete();
    }

    public function test_user_can_update_his_password() {

        $user = User::factory()->verifiedCitizen()->create([
            'password' => '$2y$10$Yi9q3k8RA6Nuuj0G3RzD7uxcMdEuy/6T2rB.INfT88KqfGTcFOYIC', // a
        ]);

        $response = $this->actingAs($user)->post(route('profile.update'), [
            'password' => 'password',
        ]);
        $response->assertStatus(302);

        // $user->refresh();
        // $this->assertTrue($user->password === Hash::make('password'));

        $user->delete();
    }

    public function test_user_can_delete_his_account() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->post(route('profile.delete', $user->id));
        $response->assertStatus(200);
    }
}
