<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\DatabaseSeeder;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_user_list()
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role_id' => 3
        ]);
        // $user = User::factory()->create();

        $response = $this->get('/api/v1/user_list');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'role_id' => $user->role_id
        ]);
    }
}
