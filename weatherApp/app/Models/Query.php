<?php

namespace App\Models;

use App\Http\Helpers\SQLQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Traits\EnumeratesValues;
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
        return self::selectCriteriumGroup($this)->toArray();
    }

    public static function selectCriteriumGroup(Query $query): Collection
    {
        return CriteriumGroup::all()->where(CriteriumGroup::QUERY, $query[self::ID]);
    }
    public function addQuery(string $description, int $contractID): Query
    {
        $query = Query::create([

            Query::CONTRACT_ID => $contractID,
            Query::DESCRIPTION => $description,
        ]);
        return $query;
    }

    public function getStationsFromQuery(array $arg = []): array
    {
        return DB::select($this->getStationsQueryString($arg));
    }
    public function getStationsQueryString(array $arg = []): string
    {
        $critiriumGroups = self::selectCriteriumGroup($this)->all();
        return SQLQueryBuilder::getCompleteQueryString($critiriumGroups, $arg);
    }

    public function getStations(): array {
        $critiriumGroups = self::selectCriteriumGroup($this)->
        whereIn(CriteriumGroup::TYPE, CriteriumType::getIDWithReferencedTable("stations"))->all();

        $stationNames = [];

        foreach ($critiriumGroups as $critiriumGroup) {
            $critiriums = $critiriumGroup->getCriteriums();

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

    public static function getQueryFromCompanyAndQueryID(int $companyID, int $queryID): ?Query
    {
        return Query::where(Query::CONTRACT_ID, $companyID)->where(Query::ID, $queryID)->first();
    }

    public static function getQueriesFromCompany(int $companyID): array
    {
        return Query::where(Query::CONTRACT_ID, $companyID)->getModels();
    }

}
