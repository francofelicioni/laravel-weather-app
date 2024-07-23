<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class WeatherService
{
    private $client;
    private $apiUrl = 'https://api.open-meteo.com/v1/forecast';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchAndStoreTemperatureData($latitude, $longitude)
    {
        $city = DB::table('cities')->where('latitude', $latitude)->where('longitude', $longitude)->first();

        if (!$city) {
            return 'City not found.';
        }

        $url = "{$this->apiUrl}?latitude={$latitude}&longitude={$longitude}&hourly=temperature_2m&wind_speed_unit=kn&timezone=Europe%2FBerlin&forecast_days=7";

        try {
            $response = $this->client->get($url);
            $data = json_decode($response->getBody(), true);

            if (isset($data['hourly']['time']) && isset($data['hourly']['temperature_2m'])) {
                $times = $data['hourly']['time'];
                $temperatures = $data['hourly']['temperature_2m'];

                if (count($times) !== count($temperatures)) {
                    return 'Mismatch between times and temperatures data.';
                }

                foreach ($times as $index => $time) {
                    $time = Carbon::parse($time);

                    DB::table('temperatures')->updateOrInsert(
                        ['city_id' => $city->id, 'time' => $time],
                        ['temperature' => $temperatures[$index]]
                    );
                }

                return 'Temperature data fetched and stored successfully.';
            } else {
                return 'No temperature data found in the response.';
            }
        } catch (\Exception $e) {
            return 'Failed to fetch temperature data: ' . $e->getMessage();
        }
    }
}
