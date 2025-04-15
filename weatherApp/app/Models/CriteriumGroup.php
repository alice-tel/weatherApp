<?php

namespace App\Models;

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
        return Criterium::all()->where(Criterium::GROUP, $this[self::ID])->toArray();
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

    public static function getCriteriumGroepFromID(int $id): CriteriumGroup {
        return CriteriumGroup::where(CriteriumGroup::ID, $id)->first(); // Query::all()->filter(fn ($query) => $query->getKey() == $id)->first();
    }
}
