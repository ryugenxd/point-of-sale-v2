<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name','super admin')->first();
        User::create([
            'name'=>'super admin',
            'username'=>'super_admin',
            'password'=>bcrypt('12345678'),
            'role_id'=> $role->id
        ]);
    }
}
