<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;
use App\Models\User;
use App\Models\Menu;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Cart::class;

    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'menu_id' => Menu::pluck('id')->random(),
            'quantity' => $this->faker->numberBetween(1,5)
        ];
    }
}
