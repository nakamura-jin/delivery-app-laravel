<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_example()
    {
        $this->seed(DatabaseSeeder::class);

        $order = Order::factory()->create();

        $response = $this->get('/api/v1/order');
        $response->assertStatus(201);
        $response->aseertJsonFragment([
            'user_id' => $order->user_id,
            'menu_list' => $order->menu_list,
            'display' => $order->display,
            'cooked' => $order->cooked,
            'date' => $order->date,
            'time' => $order->time,
        ]);
    }
}
