<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('work_stations')->insert(
            [
                'name' => 'Persiapan Bahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penghalusan Bahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perakitan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pembentukan Rangka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Penganyaman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finishing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
