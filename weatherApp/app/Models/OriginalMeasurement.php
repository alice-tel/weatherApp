<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginalMeasurement extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'corrected_measurement',
        'missing_field',
        'invalid_temperature'
    ];

    public function measurement()
    {
        return $this->belongsTo(Measurement::class, 'corrected_measurement', 'id');
    }
}
