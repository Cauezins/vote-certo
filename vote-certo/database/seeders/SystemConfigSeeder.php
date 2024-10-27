<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class SystemConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('system_settings')->insert([
            'maintance_admin' => 1,
            'maintance_landing_page' => 0,
            'maintance_election' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
