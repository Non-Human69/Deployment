<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VoorraadsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testProductExists(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
