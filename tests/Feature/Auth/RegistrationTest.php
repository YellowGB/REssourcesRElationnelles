<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;

class RegistrationTest extends TestCase
{
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(302);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post(route('register'), [
            'name'                  => 'Test',
            'firstname'             => 'User',
            'email'                 => 'test@example.com',
            'password'              => 'password',
            'password_confirmation' => 'password',
            'postcode'              => '71340',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

        User::where('email', 'test@example.com')->delete();
    }
}
