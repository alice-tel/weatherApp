<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'elevation'
    ];

    public function measurements()
    {
        return $this->hasMany(Measurement::class, 'station', 'name');
    }

    public function getMessurements(): array {
        return Measurement::where('station', $this['name'])->getModels();
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
