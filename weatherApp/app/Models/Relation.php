<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;

    protected $table = 'relations';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'first_name',
        'initials',
        'prefix',
        'company',
        'function',
        'title',
        'email',
        'phone'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company', 'id');
    }
}
