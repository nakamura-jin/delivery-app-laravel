<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => '肉料理'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'id' => 2,
            'name' => '揚げ物'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'id' => 3,
            'name' => '野菜料理'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'id' => 4,
            'name' => '定番おつまみ'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'id' => 5,
            'name' => 'ごはんもの'
        ];
        $item = new Tag;
        $item->fill($param)->save();
    }
}
