<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemperatureController extends Controller
{
    public function index(Request $request)
    {
        $cityId = $request->query('city_id');

        $city = DB::table('cities')->where('id', $cityId)->first();

        if (!$city) {
            abort(404, 'City not found');
        }

        $temperatures = DB::table('temperatures')
            ->where('city_id', $cityId)
            ->orderBy('time', 'asc')
            ->get();

        $chartData = [
            'labels' => $temperatures->pluck('time')
                ->map(fn ($date) => Carbon::parse($date)->format('d.m.Y H:i'))
                ->toArray(),
            'values' => $temperatures->pluck('temperature')->toArray(),
        ];

        return view('pages.temperatures.index', ['city_name' => $city->name, 'temperatures' => $temperatures, 'chartData' => $chartData]);
    }
}
