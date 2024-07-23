<?php

namespace App\Console\Commands;

use App\Services\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FetchTemperatureData extends Command
{
    protected $signature = 'app:fetch-temperature-data';
    protected $description = 'Fetch temperature data for cities using Open-Meteo API'; 

    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle()
    {
        $cities = DB::table('cities')->get();

        if ($cities->isEmpty()) {
            $this->error('No cities found.');
            return 1;
        }

        foreach ($cities as $city) {
            $latitude = $city->latitude;
            $longitude = $city->longitude;

            $this->info("Fetching temperature data for {$city->name} (Lat: {$latitude}, Lon: {$longitude})");

            try {
                $result = $this->weatherService->fetchAndStoreTemperatureData($latitude, $longitude);
                $this->info("Success: {$result}");
            } catch (\Exception $e) {
                $this->error("Failed to fetch temperature data for {$city->name}: " . $e->getMessage());
            }
        }

        return 0;
    }
}
