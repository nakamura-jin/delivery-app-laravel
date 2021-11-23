<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\Menu;

class MenuTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_menu_destroy()
    {
        $this->seed(DatabaseSeeder::class);

        $menu = Menu::factory()->create();

        $reponse = $this->delete('/api/v1/menu/'. $menu->id);
        $reponse->assertStatus(201);

    }
}
