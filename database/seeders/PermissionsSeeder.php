<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'user-access',
            'user-create',
            'user-edit',
            'user-delete',
            'role-access',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-access',
            'permission-create',
            'permission-edit',
            'permission-delete',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
