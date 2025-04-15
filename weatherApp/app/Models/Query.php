<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use voku\helper\ASCII;

class Query extends Model
{
    use HasFactory;
    public const TABLE_NAME = 'query';
    public const ID = 'id';
    public const DESCRIPTION = 'description';
    public const CONTRACT_ID = 'contract_id';

    protected $table = self::TABLE_NAME;
    public $timestamps = false;

    protected $fillable = [
        self::CONTRACT_ID,
        self::DESCRIPTION,
    ];

    public function getCriteriumGroups(): array
    {
        return $this->selectCriteriumGroup()->toArray();
    }

    private function selectCriteriumGroup(): Collection
    {
        return CriteriumGroup::all()->where(CriteriumGroup::QUERY, $this[self::ID]);
    }
    public function addQuery(string $description, int $contractID): Query
    {
        $query = Query::create([

            Query::CONTRACT_ID => $contractID,
            Query::DESCRIPTION => $description,
        ]);
        return $query;
    }

    public function queryQueryByCriteruimGroupID(int $id): mixed
    {
        $critiriumGroup = $this->selectCriteriumGroup()->where(CriteriumGroup::ID, $id)->first();

        $values = match ($critiriumGroup->getCriteriumType()) {
            0 => $this->getValueForGeoLocation($critiriumGroup),
        };
    }

    private function getValueForGeoLocation(CriteriumGroup $criteriumGroep): int
    {
        $type = $criteriumGroep->getCriteriumType();
        $searchTable = $type[CriteriumType::REFERENCED_TABLE];
        $searchField = $type[CriteriumType::REFERENCED_FIELD];
        $criteriums = $criteriumGroep->getCriteriums();

    }

    public function getStations(): array {
//        return CriteriumType::getIDWithReferencedTable("stations");
        $critiriumGroups = $this->selectCriteriumGroup()->
        whereIn(CriteriumGroup::TYPE, CriteriumType::getIDWithReferencedTable("stations"))->all();

        $stationNames = [];

        foreach ($critiriumGroups as $critiriumGroup) {
            $critiriums = $critiriumGroup->getCriteriums();
//            $stations = array_merge($stations, $critiriums);
            foreach ($critiriums as $critirium) {
                $stationNames[] = $critirium[Criterium::STRING_VALUE];
            }
        }

        return Station::all()->whereIn("name", $stationNames)->all();
    }

    public static function removeQuery(int $id): void
    {
        Query::where(Query::ID, $id)->delete();
    }

    public function moveToContract(int $contractID): void
    {
        $this->changeColumns([Query::CONTRACT_ID => $contractID]);
    }

    public function changeDescription(string $description): void
    {
        $this->changeColumns([Query::DESCRIPTION => $description]);
    }

    private function changeColumns(array $columns): void
    {
        Query::where(Query::ID, $this->getKey())->update($columns);
    }
    public static function getQueryFromID(int $id): Query {
        return Query::where(Query::ID, $id)->first(); // Query::all()->filter(fn ($query) => $query->getKey() == $id)->first();
    }

}
