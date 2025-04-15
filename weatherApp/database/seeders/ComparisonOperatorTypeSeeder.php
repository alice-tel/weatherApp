<?php

namespace Database\Seeders;

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
                'description'=>'Equal',
            ],
            [
                'id'=>2,
                'description'=>'Less than'
            ],
            [
                'id'=>3,
                'description'=>'Less than or equal'
            ],
            [
                'id'=>4,
                'description'=>'More than'
            ],
            [
                'id'=>5,
                'description'=>'More than or equal'
            ],
            [
                'id'=>6,
                'description'=>'Not'
            ],
        ]);
    }
}
