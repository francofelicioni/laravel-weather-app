<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            'name' => 'Palma de Mallorca',
            'latitude' => 39.57,
            'longitude' => 2.6499996,
            'image' => 'images/mallorca.svg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cities')->insert([
            'name' => 'New York',
            'latitude' => 40.7143,
            'longitude' => -74.006,
            'image' => 'images/new-york.svg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cities')->insert([
            'name' => 'Sydney',
            'latitude' => -33.8678,
            'longitude' => 151.2073,
            'image' => 'images/sydney.svg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
