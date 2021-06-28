<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('11111111'),
            'role_id' => '1',
            'site_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Sub-admin1',
            'email' => 'subadmin1@gmail.com',
            'password' => Hash::make('11111111'),
            'role_id' => '2',
            'site_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Staff1',
            'email' => 'staff1@gmail.com',
            'password' => Hash::make('11111111'),
            'role_id' => '3',
            'site_id' => '2',
        ]);
    }
}
