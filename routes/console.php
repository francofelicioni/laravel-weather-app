<?php

use App\Console\Commands\FetchTemperatureData;
use Illuminate\Support\Facades\Schedule;

Schedule::command(FetchTemperatureData::class)
    ->hourly()
    ->withoutOverlapping()
    ->sendOutputTo(storage_path('logs/temperature_data.log'));