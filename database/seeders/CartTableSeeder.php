<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
Use App\Models\User;
Use App\Models\Menu;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => User::pluck('id')->random(),
            'menu_id' => Menu::pluck('id')->random(),
            'quantity' => 1
        ];
        $item = new Cart;
        $item->fill($param)->save();
    }
}
