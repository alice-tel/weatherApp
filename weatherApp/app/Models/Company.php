<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'city',
        'street',
        'number',
        'number_additional',
        'zip_code',
        'country',
        'email'
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'id', 'company');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country', 'country_code');
    }

    public function relations()
    {
        return $this->hasMany(Relation::class, 'company', 'id');
    }
}
