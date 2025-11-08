<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activity_lists')->insert([
            [
                'work_station_id' => 1,
                'activity' => 'Pemilihan rotan berkualitas dari pemasok lokal. Jenis rotan yang dipilih biasanya tergantung pada kebutuhan',
                'facility' => 'Rotan mentah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 1,
                'activity' => 'Proses pemotongan dan pemilahan rotan untuk menyingkirkan bagian yang cacat.',
                'facility' => 'Pisau Rotan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 1,
                'activity' => 'Pengeringan rotan untuk mengurangi kadar air, umumnya dilakukan dengan cara dijemur atau menggunakan oven khusus.',
                'facility' => 'Halaman Penjemuran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 2,
                'activity' => 'Penghalusan permukaan rotan yang kasar dengan menggunakan amplas atau alat penghalus lainnya.',
                'facility' => 'Kertas amplas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 3,
                'activity' => 'Pembentukan rangka kursi dimulai dengan merangkai rotan menjadi struktur dasar kursi seperti kaki, dudukan, dan sandaran.',
                'facility' => 'Mesin bending rotan, Cordless Nail Gun, APisau Pahat atau gergaji kecil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 4,
                'activity' => 'Proses anyaman dilakukan pada bagian-bagian tertentu kursi, seperti dudukan atau sandaran, untuk memperkuat dan memperindah tampilan kursi.',
                'facility' => 'Rotan halus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 5,
                'activity' => 'Proses finishing meliputi pemberian cat atau pelitur untuk melindungi rotan dan memberikan tampilan yang lebih menarik.',
                'facility' => 'Cat, pelitur, atau vernis. Kuas atau spray gun. Kain Lap.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 5,
                'activity' => 'Pengecekan kekuatan dan stabilitas kursi.',
                'facility' => 'Pekerja Terampil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 5,
                'activity' => 'Pengemasan produk untuk melindungi dari kerusakan selama proses distribusi.',
                'facility' => 'Bubble wrap atau kain pelindung, kertas karton',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'work_station_id' => 5,
                'activity' => 'Distribusi ke bagian gudang produk jadi',
                'facility' => 'Gudang dan Manual MHE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
