<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
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
            'name' => '焼き鳥',
            'discription' => '当店自慢の一品',
            'price' => 200,
            'tag_id' => 1,
            'image' => 'https://demo-site-photo.s3.ap-northeast-1.amazonaws.com/fJUC5PoXZkwKwVN8x8u6jtgwds3Fwdllb7Wwhart.jpg'
        ];
        $item = new Menu;
        $item->fill($param)->save();
    }
}
