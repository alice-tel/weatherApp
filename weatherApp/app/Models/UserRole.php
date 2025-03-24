<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'userroles';
    public $timestamps = false;

    protected $fillable = [
        'role',
        'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_role', 'id');
    }
}
