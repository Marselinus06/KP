<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WasteDataSeeder::class,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@mallsampah.com',
            'password' => Hash::make('adminms1029'),
            'role' => 'admin',
            'nomor_telpon' => '081234567890',
            'alamat' => 'Kantor Pusat MallSampah',
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
