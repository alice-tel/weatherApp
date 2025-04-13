<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles';
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
