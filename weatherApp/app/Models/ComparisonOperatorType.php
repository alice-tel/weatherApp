<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComparisonOperatorType extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'comparison_operator_type';
    public const ID = 'id';
    public const  DESCRIPTION = 'description';
    public const  OPERATOR = 'operator';

    protected $table = self::TABLE_NAME;
    public $timestamps = false;

    protected $fillable = [
        self::DESCRIPTION,
        self::OPERATOR,
    ];

    public function getDescription(): string
    {
        return $this[self::DESCRIPTION];
    }

    public function getOperator(): string
    {
        return $this[self::OPERATOR];
    }

    public static function getComparisonTypeFromID(int $id): ComparisonOperatorType
    {
        return ComparisonOperatorType::where(ComparisonOperatorType::ID, $id)->first();
    }
}
