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
}
