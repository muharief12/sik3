<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ControlHierarchicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('control_hierarchicals')->insert([
            [
                'id' => '1',
                'name' => 'Eliminasi',
                'description' => 'Mengeliminasi sumber bahaya dari tempat kerja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'name' => 'Subtitusi',
                'description' => 'Subtitusi berupa alat, bahan, atau mesin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'name' => 'Engineering',
                'description' => 'Modifikasi atau perancangan alat, mesin, atau tempat kerja yang lebih nyaman dan aman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'name' => 'Administrasi',
                'description' => 'Prosedur, aturan, pelatihan, durasi kerja, tanda bahaya, rambu, poster dan label',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'name' => 'APD',
                'description' => 'Alat pelindung diri untuk melindungi pekerja dari bahaya di tempat kerja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
