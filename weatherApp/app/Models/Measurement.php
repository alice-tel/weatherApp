<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Measurement extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'station',
        'date',
        'time',
        'temperature',
        'dewpoint_temperature',
        'air_pressure_station',
        'air_pressure_sea_level',
        'visibility',
        'wind_speed',
        'precipitation',
        'snow_depth',
        'conditions',
        'cloud_cover',
        'wind_direction'
    ];

    public function station()
    {
        return $this->belongsTo(Station::class, 'station', 'name');
    }

    public function originalMeasurement()
    {
        return $this->hasOne(OriginalMeasurement::class, 'corrected_measurement', 'id');
    }

    public static function getLastTemperatures(int $amount, string $date) : array
    {
        $tempArray = Measurement::all()->where("date", "<", $date)->sortBy('date')->take($amount)->select('temperature')->toArray();
        $formatedTemps = [];
        foreach ($tempArray as $temperature) {
            $formatedTemps[] = $temperature['temperature'];
        }
        return $formatedTemps;
    }
}
