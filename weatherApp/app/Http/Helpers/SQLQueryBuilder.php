<?php

namespace App\Http\Helpers;

use App\Models\CriteriumGroup;
use App\Models\Geolocation;
use App\Models\Measurement;
use App\Models\Query;
use App\Models\Station;

class  SQLQueryBuilder
{
    public static function getCompleteQueryString(array $critiriumGroups, array $args = []): string
    {
        $stationTable = Station::TABLE_NAME;

        $selectsString = self::getTableSelects($critiriumGroups, $stationTable);
        $joinsString = self::getTableJoins($critiriumGroups, $stationTable);

        $whereString = self::getCompleteWhereClause($critiriumGroups, $args);

        return "SELECT $selectsString FROM $stationTable $joinsString WHERE $whereString";
    }

    private static function getTableSelects(array $criteriumGroups, string $stationTable): string
    {
        $stationName = Station::NAME;
        $stationLong = Station::LONGITUDE;
        $stationLat = Station::LATITUDE;
        $stationEve = Station::ELEVATION;
        $stationState = "geolocations.state";

        $selectClause = "$stationTable.$stationName, $stationTable.$stationLong, $stationTable.$stationLat, $stationTable.$stationEve, $stationState as location";

        foreach ($criteriumGroups as $critiriumGroup) {
            $critiriumType = $critiriumGroup->getCriteriumType();
            $table = $critiriumType->getReferencedTable();

            if ($table == $stationTable) continue;

            $field = $critiriumType->getReferencedField();

            $selectClause = "$selectClause, $table.$field";
        }
        return $selectClause;
    }
    private static function getTableJoins(array $criteriumGroups, string $stationTable): string
    {
        $joinClause = "";
        $joinedTables = [];
        foreach ($criteriumGroups as $critiriumGroup) {
            $critiriumType = $critiriumGroup->getCriteriumType();
            $table = $critiriumType->getReferencedTable();

            if ($table == $stationTable || in_array($table, $joinedTables)) continue;
            $joinedTables[] = $table;
            $stationName = Station::NAME;
            $stationNameField = $table == Measurement::TABLE_NAME ? Measurement::STATION_NAME : Station::STATION_NAME;

            $joinClause = " $joinClause JOIN $table ON $table.$stationNameField = $stationTable.$stationName";
        }
        return " $joinClause JOIN geolocations ON geolocations.station_name = $stationTable.name";
    }

    private static function getCompleteWhereClause(array $criteriumGroups, array $args = []): string {
        $whereClause = "";
        $first = true;
        usort($criteriumGroups, fn($a, $b) => strcmp($a[CriteriumGroup::GROUP_LEVEL], $b[CriteriumGroup::GROUP_LEVEL]));
        foreach ($criteriumGroups as $critiriumGroup) {
            $operator = $critiriumGroup->getOperatorType()->getDescription();
            $localWhereClause = $critiriumGroup->getWhereClause($args);

            $whereClause .= ($first ? "" : " $operator ") . $localWhereClause;

            $first = false;
        }
        return $whereClause;
    }

}
