<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contract extends Model
{
    use HasFactory;
    public const TABLE_NAME = 'contract';
    public const ID = 'id';
    public const COMPANY_ID = 'company_id';
    public const DESCRIPTION = 'description';
    public const START_DATE = 'start_date';
    public const END_DATE = 'end_date';
    public const URL = 'url';

    protected $table = self::TABLE_NAME;
    public $timestamps = false;

    protected $fillable = [
        self::COMPANY_ID,
        self::DESCRIPTION,
        self::START_DATE,
        self::END_DATE,
        self::URL,
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function getID()
    {
        return $this->getKey();
    }

    public static function getContractFromID(int $id): Contract {
        return Contract::all()->filter(fn ($contract) => $contract->getID() == $id)->first();
    }

    public function queries(): BelongsToMany
    {
        return $this->belongsToMany(Query::class,
            Query::TABLE_NAME, Query::CONTRACT_ID, self::ID);
    }

    public function getQuery(int $id): Query
    {
        return $this->queries()->where(Query::ID, $id)->first();
    }


}
