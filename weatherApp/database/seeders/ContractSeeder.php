<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(Contract::TABLE_NAME)->insert([
            [
                Contract::ID=>1,
                Contract::COMPANY_ID=>10,
                Contract::DESCRIPTION=>"A test contract",
                Contract::START_DATE=>now(),
                Contract::URL=>"",
            ],
            [
                Contract::ID=>2,
                Contract::COMPANY_ID=>12,
                Contract::DESCRIPTION=>"A test contract",
                Contract::START_DATE=>now(),
                Contract::URL=>"",
            ]
        ]);
    }
}
