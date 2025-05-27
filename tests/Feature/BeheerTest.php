<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeheerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testBeheersExists(): void
    {
        $response = $this->get('/beheers');

        $response->assertStatus(200);
    }
}
