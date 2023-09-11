<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = storage_path('dataJson/users.json');
        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('users')->insert([
                'id' => Str::uuid(),
                'username' => $item['username'],
                'email' => $item['email'],
                'password' => $item['password'],
                'role' => $item['role'],
                'phoneNumber' => $item['phoneNumber'],
                'address' => $item['address'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
