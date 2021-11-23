<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Queue\Jobs\DatabaseJob;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\DatabaseSeeder;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_login()
    {

        $this->seed(DatabaseSeeder::class);

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        $data = [
            'email' => $user->email,
            'password' => $user->password
        ];
        $response = $this->post('/api/v1/login', $data);
        $response->assertStatus(201);
    }

}
