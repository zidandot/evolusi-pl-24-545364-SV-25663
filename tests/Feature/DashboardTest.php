<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_dashboard_page_can_be_accessed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
