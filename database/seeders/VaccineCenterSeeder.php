<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vaccine_centers')->insert([
            ['name' => 'Center A', 'daily_limit' => 5],
            ['name' => 'Center B', 'daily_limit' => 5],
        ]);
    }
}
