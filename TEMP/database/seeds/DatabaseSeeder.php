<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counters')->insert([
            'active' => 0,
            'updates' => 0,
            'mettings' => 0,
            'facebookfans' => 0,
        ]);
    }
}
