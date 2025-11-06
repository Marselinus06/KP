<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WasteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('waste_data')->insert([
            ['category' => 'Plastik Botol', 'price_per_kg' => 3000, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Kardus', 'price_per_kg' => 1500, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Kertas HVS', 'price_per_kg' => 2000, 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Besi Bekas', 'price_per_kg' => 4500, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}