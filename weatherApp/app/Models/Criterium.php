<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterium extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'criterium';
    public const ID = 'id';
    public const GROUP = 'group';
    public const OPERATOR = 'operator';
    public const INT_VALUE = 'int_value';
    public const STRING_VALUE = 'string_value';
    public const FLOAT_VALUE = 'float_value';
    public const VALUE_TYPE = 'value_type';
    public const VALUE_COMPARISON = 'value_comparison';

    public const INT_VALUE_INDEX = 0;
    public const STRING_VALUE_INDEX = 1;
    public const FLOAT_VALUE_INDEX = 2;

    protected $table = self::TABLE_NAME;

    public $timestamps = false;

    protected $fillable = [
        self::GROUP,
        self::OPERATOR,
        self::INT_VALUE,
        self::STRING_VALUE,
        self::FLOAT_VALUE,
        self::VALUE_TYPE,
        self::VALUE_COMPARISON,
    ];

    public function addCriterium(int $group, int $operator, int $valueComparison, int $intValue = null, string $stringValue = null, float $floatValue = null, int $valueType = null): Criterium
    {
        $criterium = Criterium::create([
            Criterium::GROUP => $group,
            Criterium::OPERATOR => $operator,
            Criterium::INT_VALUE => $intValue,
            Criterium::STRING_VALUE => $stringValue,
            Criterium::FLOAT_VALUE => $floatValue,
            Criterium::VALUE_TYPE => $valueType,
            Criterium::VALUE_COMPARISON => $valueComparison,
        ]);

        return $criterium;
    }
    public function getOperatorType(): OperatorType
    {
        return OperatorType::getOperatorTypeFromID($this[Criterium::OPERATOR]);
    }

    public function getComparisonType(): ComparisonOperatorType
    {
        return ComparisonOperatorType::getComparisonTypeFromID($this[Criterium::VALUE_COMPARISON]);
    }

    public function getValue(): mixed
    {
        $valueType = $this[Criterium::VALUE_TYPE];
        return match ($valueType) {
            self::INT_VALUE_INDEX => $this[Criterium::INT_VALUE],
            self::STRING_VALUE_INDEX => $this[Criterium::STRING_VALUE],
            self::FLOAT_VALUE_INDEX => $this[Criterium::FLOAT_VALUE],
            null => $this[Criterium::INT_VALUE],
        };
    }

    public static function removeCriterium(int $id): void
    {
        Criterium::where(Criterium::ID, $id)->delete();
    }

    public function moveToGroup(int $groupID): void
    {
        $this->changeColumns([Criterium::GROUP => $groupID]);
    }
    public function changeOperator(int $operator): void
    {
        $this->changeColumns([Criterium::OPERATOR => $operator]);
    }

    public function changeIntValue(int $value): void
    {
        $this->changeColumns([Criterium::INT_VALUE => $value]);
    }
    public function changeStringValue(int $value): void
    {
        $this->changeColumns([Criterium::STRING_VALUE => $value]);
    }
    public function changeFloatValue(int $value): void
    {
        $this->changeColumns([Criterium::FLOAT_VALUE => $value]);
    }
    public function changeValueType(int $type): void
    {
        $this->changeColumns([Criterium::VALUE_TYPE => $type]);
    }

    public function changeValueComparison(int $comparison): void
    {
        $this->changeColumns([Criterium::VALUE_COMPARISON => $comparison]);
    }

    private function changeColumns(array $columns): void
    {
        Criterium::where(Criterium::ID, $this->getKey())->update($columns);
    }

    public static function getCriteriumFromID(int $id): Criterium {
        return Criterium::where(Criterium::ID, $id)->first(); // Query::all()->filter(fn ($query) => $query->getKey() == $id)->first();
    }

}
