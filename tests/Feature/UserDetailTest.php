<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;
use App\Models\UserDetail;

class UserDetailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testUserDetailGetSuccessfully() {

        $this->json('GET', 'api/v1/manage/users', ['Accept' => 'application/json'])
        ->assertStatus(200);
    }

    public function testUserDetailCreateSuccessfully() {

        $user_data = [
            'user_id' => 2,
            'status' => 'active',
            'position' => 'IT',
        ];

        $this->json('POST', 'api/v1/manage/users/store', $user_data, ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                'user_id' => 2,
                'status' => 'active',
                'position' => 'IT',
            ],
            'message' => 'success'
        ]);
    }

    public function testUserDetailUpdateSuccessfully() {

        $user_data = [
            'user_id' => 2,
            'status' => 'inactive',
            'position' => 'IT MANAGEMENT',
        ];

        $this->json('PUT', 'api/v1/manage/users/update/2', $user_data, ['Accept' => 'application/json'])
        ->assertStatus(200);
    }

    public function testUserDetailDeleteSuccessfully() {

        $this->json('DELETE', 'api/v1/manage/users/delete/2', ['Accept' => 'application/json'])
        ->assertStatus(200);
    }
}
