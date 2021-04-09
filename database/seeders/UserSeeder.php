<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Manager
        $user = User::create([
            'name' => 'Branch Manager', 
            'email' => 'manager@example.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'Manager']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //Sales Agent
        $user = User::create([
            'name' => 'Sales Agent', 
            'email' => 'agent@example.com',
            'password' => bcrypt('password123')
        ]);

    }
}
