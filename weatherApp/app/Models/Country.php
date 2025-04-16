<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $primaryKey = 'country_code';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'country_code',
        'country'
    ];

    public function geolocations()
    {
        return $this->hasMany(Geolocation::class, 'country_code', 'country_code');
    }

    public function company()
    {
        return $this->hasMany(Company::class, 'country', 'country_code');
    }

    public function nearestlocations()
    {
        return $this->hasMany(NearestLocation::class, 'country_code', 'country_code');
    }
}
