<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IwaSubscriptionQuery extends Model
{
    use HasFactory;

    protected $table = 'iwa_subscription_query';

    public bool $timestamps = false;

    protected $fillable = [
        'query_id',
        'contract_identifier',
        'landcodes',
        'elevation',
        'coordinates',
        'regions'
    ];
}
