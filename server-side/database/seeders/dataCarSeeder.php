<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class dataCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = storage_path('dataJson/cars.json');
        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('cars')->insert([
                'id' => Str::uuid(),
                'name' => $item['name'],
                'description' => $item['description'],
                'imageUrl' => $item['imgUrl'],
                'location' => $item['location'],
                'price' => $item['price'],
                'typeId' => $item['typeId'],
                'userId' => $item['UserId'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}