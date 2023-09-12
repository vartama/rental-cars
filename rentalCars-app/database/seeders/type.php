<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class type extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = storage_path('dataJson/types.json');
        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('types')->insert([
                'id' => Str::uuid(),
                'name' => $item['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}