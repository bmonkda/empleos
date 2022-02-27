<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Gestor']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.modos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.modos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.modos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.modos.destroy'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.empleos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empleos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empleos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empleos.destroy'])->syncRoles([$role1, $role2]);

    }
}
