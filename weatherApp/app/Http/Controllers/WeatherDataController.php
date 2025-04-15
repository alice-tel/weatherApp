<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use App\Models\Station;
use App\Models\OriginalMeasurement;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class WeatherDataController extends Controller
{
    public function store(Request $request)
    {
        Log::info('weather data received', ['data' => $request->all()]);

        try {
            // log incoming data for debugging
            $weatherDataArray = $request->input('WEATHERDATA');

            if (!$weatherDataArray || !is_array($weatherDataArray)) {
                return response()->json(['error' => 'Invalid data format'], 400);
            }

            $processedRecords = [];

            foreach ($weatherDataArray as $weatherData) {
                // validate the required fields
                $validator = Validator::make($weatherData, [
                    'STN' => 'required|numeric',
                    'DATE' => 'required|string',
                    'TIME' => 'required|string',
                ]);

                if ($validator->fails()) {
                    continue; // skip invalid records
                }

                // process the valid data
                $result = $this->processMeasurement($weatherData);
                $processedRecords[] = $result;
            }

            return response()->json([
                'message' => 'Weather data processed successfully',
                'processed_records' => count($processedRecords)
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error processing weather data', ['exception' => $e->getMessage()]);
            die("rip bozo");
            //return response()->json(['error' => 'Error processing data: ' . $e->getMessage()], 500);

        }
    }
    private function processMeasurement($data)
    {
        // check if the station exists, otherwise create new station record
        $stationName = (string)$data['STN'];
        $station = Station::firstOrCreate(['name' => $stationName]);

        // initialize measurement data
        $measurementData = [
            'station' => $stationName,
            'date' => date('Y-m-d', strtotime($data['DATE'])),
            'time' => $data['TIME'],
        ];

        // define the fields that need to be processed
        $fields = [
            'TEMP' => 'temperature',
            'DEWP' => 'dewpoint_temperature',
            'STP' => 'air_pressure_station',
            'SLP' => 'air_pressure_sea_level',
            'VISIB' => 'visibility',
            'WDSP' => 'wind_speed',
            'PRCP' => 'precipitation',
            'SNDP' => 'snow_depth',
            'FRSHTT' => 'conditions',
            'CLDC' => 'cloud_cover',
            'WNDDIR' => 'wind_direction'
        ];

        $hasMissingData = false;
        $invalidTemperature = null;
        $missingField = null;

        // process each field
        foreach ($fields as $apiField => $dbField) {
            if (!isset($data[$apiField]) || $data[$apiField] === 'None') {
                $hasMissingData = true;
                $missingField = $apiField;
                continue;
            }

            // Store the value in the measurement data array
            $measurementData[$dbField] = $data[$apiField];

            // check for invalid temp fluctuations
            if ($apiField === 'TEMP' && $this->isTemperatureInvalid($data[$apiField], $measurementData["date"])) {
                $invalidTemperature = $data[$apiField];

                $date = $measurementData["date"];
                $measurementData[$dbField] = $this->getTempsAggregate($date);
            }
        }

        // save the measurement data
        $measurement = Measurement::create($measurementData);

        // if there's missing or invalid data, log it in original_measurement table for processing and reference
        if ($hasMissingData || $invalidTemperature !== null) {
            OriginalMeasurement::create([
                'corrected_measurement' => $measurement->id,
                'missing_field' => $missingField,
                'invalid_temperature' => $invalidTemperature
            ]);
        }

        return $measurement;
    }



    private function isTemperatureInvalid($temperature, string $date) : bool
    {
        // get all the temperature of the last 30 measurements
        $lastTemps = $this->getTempsAggregate($date);

        $twentyPercent = $lastTemps * 0.2;
        $topTemperature = $lastTemps + $twentyPercent;
        $bottomTemperature = $lastTemps - $twentyPercent;

        return $temperature < $bottomTemperature || $temperature > $topTemperature;
    }

    private function getTempsAggregate(string $date): float
    {
        $lastTemps = Measurement::getLastTemperatures(30, $date);
        return $this->extrapolate($lastTemps);
    }

    private function extrapolate($lastTemps): float
    {
       $total = 0;
       foreach ($lastTemps as $temperature) {
           $total += $temperature;
       }

       return $total / sizeof($lastTemps);
    }
}
