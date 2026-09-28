<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TugasApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_tugas_endpoint_returns_json_with_cors_for_the_vue_app(): void
    {
        $response = $this->withHeader('Origin', 'http://localhost:5173')
            ->getJson('/api/tugas');

        $response->assertOk()
            ->assertJson([])
            ->assertHeader('Access-Control-Allow-Origin', 'http://localhost:5173');
    }
}
