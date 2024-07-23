<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemperatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get(__("routes.temperatures"), [TemperatureController::class, 'index'])->name('temperatures.index');