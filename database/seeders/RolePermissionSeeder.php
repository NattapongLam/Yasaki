<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::create(['name' => 'superadmin']); 
        // Role::create(['name' => 'admin']);     
        // Role::create(['name' => 'employee']);        

        Permission::create(['name' => 'machinegroups']);
        Permission::create(['name' => 'machines']);
        Permission::create(['name' => 'employees']);
        Permission::create(['name' => 'machineservices']);
        Permission::create(['name' => 'machinesystems']);
    }
}
