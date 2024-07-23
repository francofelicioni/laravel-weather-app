<?php

namespace App\Console\Commands;

use App\Services\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FetchTemperatureData extends Command
{
    protected $signature = 'app:fetch-temperature-data';
    protected $description = 'Fetch temperature data from Palma de Mallorca city using Open-Meteo API'; 

    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle()
    {
        $city = DB::table('cities')->where('name', 'Palma de Mallorca')->first();

        if (!$city) {
            $this->error('City not founded');
            return 1;
        }

        $latitude = $city->latitude;
        $longitude = $city->longitude;

        $result = $this->weatherService->fetchAndStoreTemperatureData($latitude, $longitude);
        $this->info($result);

        return 0;
    }

}
