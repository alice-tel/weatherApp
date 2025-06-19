<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geolocation extends Model
{
    use HasFactory;

    protected $table = 'geolocations';
    public $timestamps = false;

    protected $fillable = [
        'station_name',
        'country_code',
//        'island',
//        'county',
//        'place',
//        'hamlet',
//        'town',
//        'municipality',
//        'state_district',
//        'administrative',
        'state',
//        'village',
//        'region',
//        'province',
//        'city',
//        'locality',
//        'postcode',
//        'country'
    ];

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_name', 'name');
    }

    public function countryInfo()
    {
        return $this->belongsTo(Country::class, 'country_code', 'country_code');
    }
}
