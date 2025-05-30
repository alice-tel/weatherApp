<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\StaticAnalysis\ExecutableLinesFindingVisitor;

class Station extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'stations';
    public const NAME = 'name';
    public const LONGITUDE = 'longitude';
    public const LATITUDE = 'latitude';
    public const ELEVATION = 'elevation';
    public const STATION_NAME = 'station_name'; // This is for the many 'station_name' fields in other tables referencing this one.

    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        self::NAME,
        self::LONGITUDE,
        self::LATITUDE,
        self::ELEVATION,
    ];

    public function measurements()
    {
        return $this->hasMany(Measurement::class, self::TABLE_NAME, self::NAME);
    }

    public function getMessurements(): array {
        return Measurement::where(self::TABLE_NAME, $this[self::NAME])->getModels();
    }

    public function hasCorrectedMeasurement(): bool
    {
        foreach ($this->getMessurements() as $measurement) {
            if ($measurement->hasOriginalMeasurement()) {
                return true;
            }
        }
        return false;
    }

    public function geolocation()
    {
        return $this->hasOne(Geolocation::class, 'station_name', 'name');
    }

    public function nearestLocation(): NearestLocation
    {
        return $this->hasOne(NearestLocation::class, 'station_name', 'name')->getModel();
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_stations', 'station', 'subscription');
    }

    public static function getStationFromID(string $name): Station {
        return Station::where("name", $name)->first();
    }
}
