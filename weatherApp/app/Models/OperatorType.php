<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorType extends Model
{
    use HasFactory;

    protected $table = 'operator_type';
    public $timestamps = false;

    protected $fillable = [
        'description',
    ];
}
