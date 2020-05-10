<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleToUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role   = Role::where('id', 1)->first();
        $editor_role = Role::where('id', 2)->first();
        $admin_role  = Role::where('id', 3)->first();
        $users       = User::all();
        foreach ($users as $user) {
            switch ($user->id) {
                case 1:
                    $user->assignRole($user_role);
                break;
                case 2:
                    $user->assignRole($editor_role);
                break;
                case 3:
                    $user->assignRole($admin_role);
                break;
            }
        }
    }
}
