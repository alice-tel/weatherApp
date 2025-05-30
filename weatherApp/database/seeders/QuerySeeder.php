<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Query;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(Query::TABLE_NAME)->insert([
            [
                Query::ID=>1,
                Query::CONTRACT_ID=>1,
                Query::DESCRIPTION=>"A test query 1",
            ],
            [
                Query::ID=>2,
                Query::CONTRACT_ID=>1,
                Query::DESCRIPTION=>"A test query 2",
            ],
            [
                Query::ID=>3,
                Query::CONTRACT_ID=>2,
                Query::DESCRIPTION=>"A test query 3",
            ],
            [
                Query::ID=>4,
                Query::CONTRACT_ID=>1,
                Query::DESCRIPTION=>"A test geolocation",
            ],
            [
                Query::ID=>10,
                Query::CONTRACT_ID=>1,
                Query::DESCRIPTION=>"Get Station With Temperature <15C and argTime=<time<(argTime+60)",
            ],
            [
                Query::ID=>11,
                Query::CONTRACT_ID=>1,
                Query::DESCRIPTION=>"Get Station With Humidity of Date",
            ],
        ]);
    }
}
