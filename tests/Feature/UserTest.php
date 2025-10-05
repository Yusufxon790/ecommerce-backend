<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_bring_all_users()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
        $response->assertJson([
            'data'=>true,
        ]);
    }
}
