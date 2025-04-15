<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorType extends Model
{
    use HasFactory;

    public const  TABLE_NAME = 'operator_type';
    public const  ID = 'id';
    public const  DESCRIPTION = 'description';

    protected $table = self::TABLE_NAME;
    public $timestamps = false;

    protected $fillable = [
        self::DESCRIPTION,
    ];

    public function getDescription(): string
    {
        return $this[self::DESCRIPTION];
    }

    public static function getOperatorTypeFromID(int $id): OperatorType
    {
        return OperatorType::where(OperatorType::ID, $id)->first();
    }
}
