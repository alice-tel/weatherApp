<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CriteriumGroup extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'criterium_group';
    public const ID = 'id';
    public const QUERY = 'query';
    public const TYPE = 'type';
    public const GROUP_LEVEL = 'group_level';
    public const OPERATOR = 'operator';

    protected $table = self::TABLE_NAME;
    public $timestamps = false;

    protected $fillable = [
        self::QUERY,
        self::TYPE,
        self::GROUP_LEVEL,
        self::OPERATOR,
    ];

    public function queries(): BelongsToMany
    {
        return $this->belongsToMany(Criterium::class,
            Criterium::TABLE_NAME, Criterium::GROUP, self::ID);
    }
}
