<?php

use Illuminate\Database\Seeder;

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
            'post',
            'user'
        ];

        $actions = [
            'view',
            'insert',
            'edit',
            'delete',
        ];

        $data = [];

        foreach ($permissions as $permission) {
            foreach ($actions as $action) {
                $data[] = [
                    'name'       => $permission . ' ' . $action,
                    'guard_name' => 'admin',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ];
            }
        }
        $data[] = [
            'name'       => 'see admin',
            'guard_name' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
