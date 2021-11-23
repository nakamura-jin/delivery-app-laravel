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
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ];
        $item = new User;
        $item->fill($param)->save();

        $param = [
            'name' => 'staff',
            'email' => 'staff@test.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ];
        $item = new User;
        $item->fill($param)->save();

        $param = [
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role_id' => 3
        ];
        $item = new User;
        $item->fill($param)->save();
    }
}
