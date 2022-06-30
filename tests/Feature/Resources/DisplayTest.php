<?php

namespace Tests\Feature\Resources;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DisplayTest extends TestCase
{
    public function test_can_display_catalogue() {
        $response = $this->get(LaravelLocalization::transRoute('routes.catalogue'));

        $response->assertStatus(302);
    }
}
