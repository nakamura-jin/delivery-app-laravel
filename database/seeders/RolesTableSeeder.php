<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
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
        ];
        $role = new Role;
        $role->fill($param)->save();

        $param = [
            'id' => 2,
            'name' => 'staff',
        ];
        $role = new Role;
        $role->fill($param)->save();

        $param = [
            'id' => 3,
            'name' => 'user',
        ];
        $role = new Role;
        $role->fill($param)->save();
    }
}
