<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriumType extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'criterium_type';
    public const ID = 'id';
    public const DESCRIPTION = 'description';
    public const REFERENCED_TABLE = 'referenced_table';
    public const REFERENCED_FIELD = 'referenced_field';

    protected $table = self::TABLE_NAME;
    public $timestamps = false;

    protected $fillable = [
        self::DESCRIPTION,
        self::REFERENCED_TABLE,
        self::REFERENCED_FIELD,
    ];


    public static function getCriteriumTypeWithReferencedTable(string $referencedTable): array
    {
        return CriteriumType::where(CriteriumType::REFERENCED_TABLE, $referencedTable)->getModels();
    }

    public static function getIDWithReferencedTable(string $referencedTable): array
    {
        return CriteriumType::where(CriteriumType::REFERENCED_TABLE, $referencedTable)->pluck(self::ID)->toArray();
    }

    public static function getCriteriumTypeFromID(int $id): CriteriumType {
        return CriteriumType::where(CriteriumType::ID, $id)->first();
    }
}
