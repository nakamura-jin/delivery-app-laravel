<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'uid' => 'ENmvcJvQ6kbXpyBdtxwsyNpfJgi1',
            'role_id' => 1
        ];
        $item = new User;
        $item->fill($param)->save();

    }
}
