<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndpointActivity extends Model
{
    use HasFactory;

    protected $table = 'endpoint_activity';
    public $timestamps = false;

    protected $fillable = [
        'identifier',
        'endpoint_used',
        'files_downloaded',
        'activity_date',
        'activity_time',
        'authorized',
        'data_transferred'
    ];
}
