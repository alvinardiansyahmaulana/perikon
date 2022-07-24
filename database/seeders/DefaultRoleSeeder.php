<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DefaultRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super_admin',
            'admin_level_one',
            'admin_level_two'
        ];

        foreach ($roles as $key => $value) {
            Role::create(["name" => $value]);
        }
    }
}
