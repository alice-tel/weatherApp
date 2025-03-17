<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherViewController extends Controller
{

    public function index()
    {
        Log::info('weather data received');

        $latestMeasurements = Measurement::with(['station', 'originalMeasurement'])
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->take(50)
            ->get();

        return view('weather.index', compact('latestMeasurements'));
    }

    public function station($stationName)
    {
        $station = Station::where('name', $stationName)->firstOrFail();

        $measurements = Measurement::where('station', $stationName)
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->paginate(25);

        return view('weather.station', compact('station', 'measurements'));
    }

    public function dashboard()
    {
        $latestByStation = Measurement::with('station')
            ->select('station', \DB::raw('MAX(id) as latest_id'))
            ->groupBy('station')
            ->get()
            ->pluck('latest_id');

        $latestMeasurements = Measurement::whereIn('id', $latestByStation)
            ->with(['station', 'originalMeasurement'])
            ->get();

        return view('weather.dashboard', compact('latestMeasurements'));
    }

    public function latestData()
    {
        $latestByStation = Measurement::select('station', \DB::raw('MAX(id) as latest_id'))
            ->groupBy('station')
            ->get()
            ->pluck('latest_id');

        $latestMeasurements = Measurement::whereIn('id', $latestByStation)
            ->with(['station', 'originalMeasurement'])
            ->get();

        $formattedData = $latestMeasurements->map(function($measurement) {
            return [
                'station' => $measurement->station,
                'date' => $measurement->date,
                'time' => $measurement->time,
                'temperature' => $measurement->temperature,
                'wind_speed' => $measurement->wind_speed,
                'wind_direction' => $measurement->wind_direction,
                'cloud_cover' => $measurement->cloud_cover,
                'precipitation' => $measurement->precipitation,
                'conditions' => $this->formatConditions($measurement->conditions),
                'has_issues' => $measurement->originalMeasurement ? true : false,
                'station_url' => route('weather.station', $measurement->station)
            ];
        });

        return response()->json($formattedData);
    }

    private function formatConditions($conditions)
    {
        if (!$conditions) return 'None';

        $formatted = [];
        if (substr($conditions, 0, 1) === '1') $formatted[] = 'Frost';
        if (substr($conditions, 1, 1) === '1') $formatted[] = 'Rain';
        if (substr($conditions, 2, 1) === '1') $formatted[] = 'Snow';
        if (substr($conditions, 3, 1) === '1') $formatted[] = 'Hail';
        if (substr($conditions, 4, 1) === '1') $formatted[] = 'Thunder';
        if (substr($conditions, 5, 1) === '1') $formatted[] = 'Tornado';

        return count($formatted) > 0 ? implode(', ', $formatted) : 'None';
    }
}
