<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionStation extends Model
{
    use HasFactory;

    protected $table = 'subscription_station';
    public $timestamps = false;

    protected $fillable = [
        'subscription',
        'station'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription', 'id');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station', 'name');
    }
}
