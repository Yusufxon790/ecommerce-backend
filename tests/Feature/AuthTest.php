<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    /**
     * @mixin \Illuminate\Foundation\Testing\TestCase 
     * @var \Tests\TestCase $this
     * @var \App\Models\User $user
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        $user=User::factory()->create();
        $response = $this->post('/api/login',['email'=>$user->email,'password'=>'password']);
        $response->assertStatus(200)
        ->assertJson([
            'data'=>true,
            'success'=>true,
            'status'=>true
        ]);

        $response->assertJsonStructure([
            'data'=>[
                'token'
            ]
        ]);

    }

    public function test_can_get_system_entered_users(){
        $user = User::factory()->createOne();

        $response = $this->actingAs($user)->get('/api/user');
        $response->assertStatus(200);
        $response->assertOk()->assertJson([
            'data'=>true,
        ]);
        $this->assertAuthenticatedAs($user);
    }
}
