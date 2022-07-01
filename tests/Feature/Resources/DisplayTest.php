<?php

namespace Tests\Feature\Resources;

use Tests\TestCase;

class DisplayTest extends TestCase
{
    public function test_can_display_catalogue() {
        $response = $this->get(route('catalogue'));

        $response->assertStatus(302);
    }
}
