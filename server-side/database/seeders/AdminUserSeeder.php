<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            'id' => Str::uuid(), // Menghasilkan UUID otomatis
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang Anda inginkan
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Insert data pengguna admin ke dalam tabel "users"
        DB::table('users')->insert($adminData);
    }
}
