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
            'name' => 'admin',
        ];
        $role = new Role;
        $role->fill($param)->save();

        $param = [
            'name' => 'staff',
        ];
        $role = new Role;
        $role->fill($param)->save();

        $param = [
            'name' => 'user',
        ];
        $role = new Role;
        $role->fill($param)->save();
    }
}
