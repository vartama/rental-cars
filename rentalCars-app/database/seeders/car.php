<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class car extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonPath = storage_path('dataJson/cars.json');
        $json = File::get($jsonPath);
        $data = json_decode($json, true);
        $userUUIDs = DB::table('users')->pluck('id')->toArray();
        $typeUUIDs = DB::table('types')->pluck('id')->toArray();

        foreach ($data as $item) {
            DB::table('cars')->insert([
                'id' => Str::uuid(),
                'name' => $item['name'],
                'description' => $item['description'],
                'imageUrl' => $item['imgUrl'],
                'location' => $item['location'],
                'price' => $item['price'],
                'typeId' => Arr::random($typeUUIDs),
                'userId' => Arr::random($userUUIDs),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
