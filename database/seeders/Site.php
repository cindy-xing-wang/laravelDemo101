<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Site extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'name' => 'Head Office'
        ]);
        DB::table('sites')->insert([
            'name' => 'Christchurch'
        ]);
        DB::table('sites')->insert([
            'name' => 'Wellington'
        ]);

        DB::table('sites')->insert([
            'name' => 'Auckland'
        ]);
    }
}
