<?php

namespace App\Models;

use Carbon\Traits\Creator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Log;

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

    public function getCriteriums(): array
    {
        return Criterium::all()->where(Criterium::GROUP, $this[self::ID])->all();
    }

    public function addCriteriumGroep(int $query, int $type, int $operator, int $groupLevel = null): CriteriumGroup
    {
        $criteriumGroep = CriteriumGroup::create([
            CriteriumGroup::QUERY => $query,
            CriteriumGroup::TYPE => $type,
            CriteriumGroup::OPERATOR => $operator,
            CriteriumGroup::GROUP_LEVEL => $groupLevel,
        ]);

        return $criteriumGroep;
    }

    public function getCriteriumType(): CriteriumType
    {
        return CriteriumType::getCriteriumTypeFromID($this[CriteriumGroup::TYPE]);
    }

    public function getOperatorType(): OperatorType
    {
        return OperatorType::getOperatorTypeFromID($this[Criterium::OPERATOR]);
    }
    public static function removeCriteriumGroep(int $id): void
    {
        CriteriumGroup::where(CriteriumGroup::ID, $id)->delete();
    }

    public function moveToQuery(int $queryID): void
    {
        $this->changeColumns([CriteriumGroup::QUERY => $queryID]);
    }

    public function changeCriteruimType(int $type): void
    {
        $this->changeColumns([CriteriumGroup::TYPE => $type]);
    }

    public function changeGroupLevel(int $level): void
    {
        $this->changeColumns([CriteriumGroup::GROUP_LEVEL => $level]);
    }

    public function changeOperator(int $operator): void
    {
        $this->changeColumns([CriteriumGroup::OPERATOR => $operator]);
    }

    private function changeColumns(array $columns): void
    {
        CriteriumGroup::where(CriteriumGroup::ID, $this->getKey())->update($columns);
    }

    public function getWhereClause(array $args = []): string
    {
        $type = $this->getCriteriumType();
        $searchTable = $type[CriteriumType::REFERENCED_TABLE];
        $searchField = $type[CriteriumType::REFERENCED_FIELD];
        $criteriums = $this->getCriteriums();

        $whereClause = "";

        $first = true;

        foreach ($criteriums as $criterium) {
            $operator = $criterium->getOperatorType()->getDescription();
            if ($first) $operator = "";
            $criteriumType = $criterium[Criterium::VALUE_TYPE];
            $field = $type->getReferencedField();
            $value = $criterium->getValue() ?? $args[$field];
            $comparison = $criterium->getComparisonType()->getOperator();

            if ($criteriumType == Criterium::STRING_VALUE_INDEX || $criteriumType == Criterium::ARG_VALUE_INDEX)
                $value = "'$value'";
            if ($field == 'time')
                $value = "time($value)";
            if (($addVal = $criterium[Criterium::STRING_VALUE]) != null)
                $value = $field == 'time' ? "($value + time('$addVal'))" : "($value + $addVal)";

            $whereClause = "$whereClause $operator $searchTable.$searchField $comparison $value";

            $first = false;
        }
        return "($whereClause)";
    }


    public static function getCriteriumGroepFromID(int $id): CriteriumGroup {
        return CriteriumGroup::where(CriteriumGroup::ID, $id)->first(); // Query::all()->filter(fn ($query) => $query->getKey() == $id)->first();
    }
}
