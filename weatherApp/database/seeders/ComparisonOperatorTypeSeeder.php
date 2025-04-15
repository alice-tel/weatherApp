<?php

namespace Database\Seeders;

use App\Models\ComparisonOperatorType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComparisonOperatorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comparison_operator_type')->insert([
            [
                'id'=>1,
                ComparisonOperatorType::DESCRIPTION=>'equal',
                ComparisonOperatorType::OPERATOR=>'=',
            ],
            [
                'id'=>2,
                ComparisonOperatorType::DESCRIPTION=>'Less than',
                ComparisonOperatorType::OPERATOR=>'<',
            ],
            [
                'id'=>3,
                ComparisonOperatorType::DESCRIPTION=>'Less than or equal',
                ComparisonOperatorType::OPERATOR=>'<=',
            ],
            [
                'id'=>4,
                ComparisonOperatorType::DESCRIPTION=>'More than',
                ComparisonOperatorType::OPERATOR=>'>',
            ],
            [
                'id'=>5,
                ComparisonOperatorType::DESCRIPTION=>'More than or equal',
                ComparisonOperatorType::OPERATOR=>'>=',
            ],
            [
                'id'=>6,
                ComparisonOperatorType::DESCRIPTION=>'Not equal',
                ComparisonOperatorType::OPERATOR=>'<>',
            ],
        ]);
    }
}
