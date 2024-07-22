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
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
