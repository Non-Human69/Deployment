<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function statusReturnsPositive()
    {
        $response = $this->get('/'); // Replace '/' with the route you want to test

        $response->assertStatus(200);
    }
}
