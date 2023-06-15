<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();
        // Masyarakat::factory(5)->create();
        // Pengaduan::factory(15)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas123'),
            'role' => 'petugas'
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'role' => 'masyarakat'
        ]);

        //Masyarakat::factory(5)->create();
        Masyarakat::factory()->create([
            'nik' => '3214012612020006',
            'telp' => '081646964211',
            'jk' => 'L',
            'alamat' => 'Bandung',
            'user_id' => 3
        ]);

        Kategori::factory()->create([
            'name' => 'Manufaktur'
        ]);
    }
}
