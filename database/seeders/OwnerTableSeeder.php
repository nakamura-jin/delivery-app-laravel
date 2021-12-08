<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnerTableSeeder extends Seeder
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
            'name' => 'admin',
            'email' => 'admin@test.com',
            'uid' => '7OuoFhraJtblFlhlb2DfP4XcK5i2',
            'role_id' => 1
        ];
        $item = new Owner;
        $item->fill($param)->save();

        $param = [
            'id' => 2,
            'name' => 'member',
            'email' => 'member@test.com',
            'uid' => 'BVrf7zWUESOsipuWHbNE4lhMnhE',
            'role_id' => 2
        ];
        $item = new Owner;
        $item->fill($param)->save();
    }
}
