<?php

namespace App\Services;
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
        $url = "{$this->apiUrl}?latitude={$latitude}&longitude={$longitude}&hourly=temperature_2m&timezone=Europe%2FBerlin";

        try {
            $response = $this->client->get($url);
            $data = json_decode($response->getBody(), true);

            if (isset($data['hourly']['temperature_2m'])) {
                $temperatures = $data['hourly']['temperature_2m'];
                $currentTimestamp = now();

                foreach ($temperatures as $hour => $temperature) {
                    DB::table('temperatures')->updateOrInsert(
                        ['city_id' => 1, 'recorded_at' => $currentTimestamp->addHour($hour)],
                        ['temperature' => $temperature]
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

