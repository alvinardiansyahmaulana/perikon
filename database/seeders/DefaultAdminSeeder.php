<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        
        foreach ($roles as $key => $value) {
            User::create([
                "name" => "Alvin Ardiansyah",
                "role_id" => $value->id,
                "email" => $value->name . "@mail.com",
                "password" => bcrypt("perikon")
            ]);
        }
    }
}
