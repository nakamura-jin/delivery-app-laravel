<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Menu;
use App\Models\Tag;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Menu::class;


    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'discription' => $this->faker->text(20),
            'price' => $this->faker->randomNumber(3),
            'tag_id' => Tag::pluck('id')->random(),
            'image' => $this->faker->image,
        ];
    }
}
