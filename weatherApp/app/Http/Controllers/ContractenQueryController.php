<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\CriteriumType;
use App\Models\NearestLocation;
use App\Models\Query;
use App\Models\Station;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;
use Psy\Util\Json;

class ContractenQueryController extends Controller
{
    public function getQuery(int $identifier, int $idQuery)
    {
        $query = Query::getQueryFromCompanyAndQueryID($identifier, $idQuery);
        if ($query == null) return response()->json(null);
        return $query;
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
