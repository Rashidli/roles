<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddPermissionToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            switch ($role->name) {
                case 'editor':// or role id
                    $role->syncPermissions([1,2,3,4,5,9]);// or permissions name [post edit,post create,...]
                break;
                case 'admin': //or super admin for all permissions
                    $role->syncPermissions([1,2,3,4,5,6,7,8,9]);
                break;
            }
        }
    }
}
