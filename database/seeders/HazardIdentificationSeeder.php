<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HazardIdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hazard_identifications')->insert([
            [
                'activity_list_id' => 1,
                'hazard' => 'Bahaya ergonomi saat mengangkat rotan yang berat.',
                'risk' => 'Cedera otot, punggung atau bahu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 1,
                'hazard' => 'Cedera akibat rotan yang tajam atau rusak.',
                'risk' => 'Luka atau sayatan pada tangan akibat rotan yang tajam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 2,
                'hazard' => 'Bahaya terkena pisau atau alat pemotong.',
                'risk' => 'Luka potong pada tangan atau jari.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 2,
                'hazard' => 'Serpihan rotan yang terlempar.',
                'risk' => 'Cedera mata akibat serpihan rotan yang terlempar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 3,
                'hazard' => 'Dehidrasi atau heat stroke saat menjemur rotan.',
                'risk' => 'Heat exhaustion atau dehidrasi akibat panas berlebih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 4,
                'hazard' => 'Paparan debu rotan.',
                'risk' => 'Masalah pernapasan akibat inhalasi debu rotan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 4,
                'hazard' => 'Cedera tangan akibat alat penghalus.',
                'risk' => 'Luka pada tangan atau jari.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 5,
                'hazard' => 'Risiko ergonomi saat merakit rangka kursi.',
                'risk' => 'Cedera punggung, tangan, atau jari.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 5,
                'hazard' => 'Penggunaan alat tangan yang bisa menyebabkan cedera.',
                'risk' => 'Luka akibat alat yang tajam atau berat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 6,
                'hazard' => 'Cedera tangan atau jari saat menganyam.',
                'risk' => 'Cedera otot atau sendi pada tangan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 6,
                'hazard' => 'Bahaya postur kerja yang tidak ergonomis.',
                'risk' => 'Nyeri punggung atau leher akibat postur yang buruk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 7,
                'hazard' => 'Paparan bahan kimia dari cat atau pelitur.',
                'risk' => 'Masalah pernapasan akibat inhalasi bahan kimia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 7,
                'hazard' => 'Bahaya kebakaran dari bahan mudah terbakar.',
                'risk' => 'Cedera atau kebakaran karena bahan kimia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 8,
                'hazard' => 'Risiko kecelakaan saat menguji stabilitas kursi.',
                'risk' => 'Cedera jatuh saat mengecek kursi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 8,
                'hazard' => 'Postur tubuh yang tidak ergonomis.',
                'risk' => 'Cedera otot akibat postur tubuh yang salah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 9,
                'hazard' => 'Cedera akibat alat pengemas atau material pengemasan (misalnya tali atau plastik).',
                'risk' => 'Luka pada tangan akibat tali atau alat pemotong.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 9,
                'hazard' => 'Cedera akibat alat pengemas atau material pengemasan (misalnya tali atau plastik).',
                'risk' => 'Cedera punggung akibat mengangkat berat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 10,
                'hazard' => 'Bahaya ergonomi saat mengangkat atau memindahkan produk.',
                'risk' => 'Cedera punggung atau lutut akibat angkat beban.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_list_id' => 10,
                'hazard' => 'Bahaya ergonomi saat mengangkat atau memindahkan produk.',
                'risk' => 'Tersandung atau jatuh saat membawa barang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
