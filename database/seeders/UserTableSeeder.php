<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
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
            'uid' => Hash::make('7OuoFhraJtblFlhlb2DfP4XcK5i2'),
            'role_id' => 1
        ];
        $item = new User;
        $item->fill($param)->save();

        $param = [
            'id' => 2,
            'name' => 'member',
            'email' => 'member@test.com',
            'uid' => Hash::make('BVrf7zWUESOsipuWHbNE4lhMnhE'),
            'role_id' => 2
        ];
        $item = new User;
        $item->fill($param)->save();

    }
}
