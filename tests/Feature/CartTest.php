<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\Cart;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_cart_index()
    {
        $this->seed(DatabaseSeeder::class);

        $cart = Cart::factory()->create();

        $response = $this->get('/api/v1/'. $cart->id .'/cart');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'user_id' => $cart->user_id,
            'menu_id' => $cart->menu_id,
            'quantity' => $cart->quantity
        ]);
    }
}
