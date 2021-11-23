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
            'name' => '肉料理'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'name' => '揚げ物'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'name' => '野菜料理'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'name' => '定番おつまみ'
        ];
        $item = new Tag;
        $item->fill($param)->save();

        $param = [
            'name' => 'ごはんもの'
        ];
        $item = new Tag;
        $item->fill($param)->save();
    }
}
