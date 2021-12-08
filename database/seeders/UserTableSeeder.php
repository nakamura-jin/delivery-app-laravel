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
            'name' => 'user',
            'email' => 'user@test.com',
            'uid' => Hash::make('7OuoFhraJtblFlhlb2DfP4XcK5i2'),
            'role_id' => 1
        ];
        $item = new User;
        $item->fill($param)->save();

    }
}
