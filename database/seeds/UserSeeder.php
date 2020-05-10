<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'user',
            'editor',
            'admin'
        ];

        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'name'       => $user,
                'email'      => $user . '@role.az',
                'password'   => Hash::make('123456789'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
