<?php

namespace Tests\Feature;

use App\Models\User;
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
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login()
    {
        $user = User::factory()->make();
        $response = $this->get(route('login'), [
            'email' => 'example2@gmail.com',
            'password' => '12345678'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }
}
