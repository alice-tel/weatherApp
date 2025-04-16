<?php

namespace App\Http\Controllers;

use App\Models\Station;

class FaultyStationsController extends Controller
{


    public function show(){

        $stationsAll = Station::all();

        $stations = [];

        foreach ($stationsAll as $station) {
            if ($station->hasCorrectedMeasurement())
                $stations[] = $station;
        }

        return view('faulty.stations', compact('stations'));
    }

}
