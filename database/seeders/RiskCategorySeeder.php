<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('risk_categories')->insert([
            ['likelihood' => 1, 'severity' => 1, 'category' => 'Rendah', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 2, 'severity' => 1, 'category' => 'Rendah', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 3, 'severity' => 1, 'category' => 'Rendah', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 4, 'severity' => 1, 'category' => 'Rendah', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 5, 'severity' => 1, 'category' => 'Moderat', 'created_at' => now(), 'updated_at' => now()],

            ['likelihood' => 1, 'severity' => 2, 'category' => 'Rendah', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 2, 'severity' => 2, 'category' => 'Rendah', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 3, 'severity' => 2, 'category' => 'Moderat', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 4, 'severity' => 2, 'category' => 'Moderat', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 5, 'severity' => 2, 'category' => 'Moderat', 'created_at' => now(), 'updated_at' => now()],

            ['likelihood' => 1, 'severity' => 3, 'category' => 'Moderat', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 2, 'severity' => 3, 'category' => 'Moderat', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 3, 'severity' => 3, 'category' => 'Tinggi', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 4, 'severity' => 3, 'category' => 'Tinggi', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 5, 'severity' => 3, 'category' => 'Tinggi', 'created_at' => now(), 'updated_at' => now()],

            ['likelihood' => 1, 'severity' => 4, 'category' => 'Tinggi', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 2, 'severity' => 4, 'category' => 'Tinggi', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 3, 'severity' => 4, 'category' => 'Tinggi', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 4, 'severity' => 4, 'category' => 'Ekstrem', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 5, 'severity' => 4, 'category' => 'Ekstrem', 'created_at' => now(), 'updated_at' => now()],

            ['likelihood' => 1, 'severity' => 5, 'category' => 'Tinggi', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 2, 'severity' => 5, 'category' => 'Ekstrem', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 3, 'severity' => 5, 'category' => 'Ekstrem', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 4, 'severity' => 5, 'category' => 'Ekstrem', 'created_at' => now(), 'updated_at' => now()],
            ['likelihood' => 5, 'severity' => 5, 'category' => 'Ekstrem', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
