<?php

namespace Database\Seeders;

use App\Models\CriteriumGroup;
use App\Models\Query;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriumGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(CriteriumGroup::TABLE_NAME)->insert([
            [
                CriteriumGroup::ID=>1,
                CriteriumGroup::QUERY=>1,
                CriteriumGroup::TYPE=>4,
                CriteriumGroup::GROUP_LEVEL=>2,
                CriteriumGroup::OPERATOR=>1,
            ],
            [
                CriteriumGroup::ID=>2,
                CriteriumGroup::QUERY=>1,
                CriteriumGroup::TYPE=>4,
                CriteriumGroup::GROUP_LEVEL=>3,
                CriteriumGroup::OPERATOR=>1,
            ],
            [
                CriteriumGroup::ID=>3,
                CriteriumGroup::QUERY=>1,
                CriteriumGroup::TYPE=>2,
                CriteriumGroup::GROUP_LEVEL=>1,
                CriteriumGroup::OPERATOR=>1,
            ],
            [
                CriteriumGroup::ID=>4,
                CriteriumGroup::QUERY=>2,
                CriteriumGroup::TYPE=>2,
                CriteriumGroup::GROUP_LEVEL=>2,
                CriteriumGroup::OPERATOR=>1,
            ],
            [
                CriteriumGroup::ID=>5,
                CriteriumGroup::QUERY=>3,
                CriteriumGroup::TYPE=>1,
                CriteriumGroup::GROUP_LEVEL=>2,
                CriteriumGroup::OPERATOR=>1,
            ],
            [
                CriteriumGroup::ID=>6,
                CriteriumGroup::QUERY=>3,
                CriteriumGroup::TYPE=>1,
                CriteriumGroup::GROUP_LEVEL=>1,
                CriteriumGroup::OPERATOR=>2,
            ],
            [
                CriteriumGroup::ID=>7,
                CriteriumGroup::QUERY=>4,
                CriteriumGroup::TYPE=>1,
                CriteriumGroup::GROUP_LEVEL=>1,
                CriteriumGroup::OPERATOR=>1,
            ],
        ]);
    }
}
