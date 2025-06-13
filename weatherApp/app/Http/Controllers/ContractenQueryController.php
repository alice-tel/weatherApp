<?php

namespace App\Http\Controllers;

use App\Models\NearestLocation;
use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContractenQueryController extends Controller
{
    public function getQuery(Request $request, int $identifier, int $idQuery): array
    {
        $query = Query::getQueryFromCompanyAndQueryID($identifier, $idQuery);
//        return $query->getStationsQueryString($request->all());
        $stations = $query->getStationsFromQuery($request->all());
        if ($idQuery == 11){
            foreach ($stations as $station){
               $station->humidity = $station->cloud_cover;
               unset($station->cloud_cover);
               //just to bring date down again
                $val = $station->date;
                unset($station->date);
                $station->date = $val;
            }
        }
        return $stations;
    }
    public function getStationsFromQuery(int $identifier, int $idQuery)
    {
        $query = Query::getQueryFromCompanyAndQueryID($identifier, $idQuery);
        if ($query == null) return response()->json(null);
        $stations = $query->getStationsFromQuery();
        return response()->json($stations);
    }

    public function getStationFromName(int $identifier, string $name)
    {
        $queries = Query::getQueriesFromCompany($identifier);

        $stations = [];

        foreach ($queries as $query) {
            $stations = array_merge($stations, $query->getStationsFromQuery());
        }

        $stationResult = null;

        foreach ($stations as $station) {
            if ($station["name"] === $name) {
                $stationResult = $station;
            }
        }


        if ($stationResult == null) return response()->json(null);

        $nearestLocations = NearestLocation::where("station_name", $stationResult["name"])->getModels();

//        if ($nearestLocation == null) return $stationResult;
//
//        $stationString = rtrim("$stationResult", "}");
//        $nearestLocationString = ltrim("$nearestLocation", "{");

//        return $stationString.", ".$nearestLocationString;

        $stationResult["nearest_locations"] = $nearestLocations;
        return $stationResult;
    }
}
