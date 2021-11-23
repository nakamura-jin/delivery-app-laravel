<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;
use App\Models\Menu;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'menu_list' => ['id' => Menu::pluck('id')->random(), 'quantity' => $this->faker->randomNumber(1,5)],
            'display' => 1,
            'cooked' => 1,
            'date' => $this->faker->dateTime()->format('Y-m-d'),
            'time' => $this->faker->dateTime()->format('H:i:s'),
        ];
    }
}
