<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Menu;


class OrderTableSeeder extends Seeder
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
            'menu_list' => ['id' => Menu::pluck('id')->first(), 'quantity' => 1],
            'display' => 1,
            'cooked' => 1,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
        ];
        $item = new Order;
        $item->fill($param)->save();
    }
}
