<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operator_type')->insert([
            [
                'id'=>1,
                'description'=>'And',
            ],
            [
                'id'=>2,
                'description'=>'Or'
            ]
        ]);
    }
}
