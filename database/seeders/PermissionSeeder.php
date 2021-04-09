<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-create',
            'role-edit',
            'role-delete',
            'branch-create',
            'branch-edit',
            'branch-delete',
            'lead-create',
            'lead-edit',
            'lead-delete',
            'product-create',
            'product-edit',
            'product-delete'
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

    }
}
