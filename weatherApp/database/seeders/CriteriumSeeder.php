<?php

namespace Database\Seeders;

use App\Models\Criterium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table(Criterium::TABLE_NAME)->insert([
            [
                Criterium::ID=>1,
                Criterium::GROUP=>1,
                Criterium::OPERATOR=>2,
                Criterium::INT_VALUE=>null,
                Criterium::STRING_VALUE=>null,
                Criterium::FLOAT_VALUE=>6.367,
                Criterium::VALUE_TYPE=>Criterium::FLOAT_VALUE_INDEX,
                Criterium::VALUE_COMPARISON=>1,
            ],
            [
                Criterium::ID=>2,
                Criterium::GROUP=>1,
                Criterium::OPERATOR=>2,
                Criterium::INT_VALUE=>null,
                Criterium::STRING_VALUE=>null,
                Criterium::FLOAT_VALUE=>7.9,
                Criterium::VALUE_TYPE=>Criterium::FLOAT_VALUE_INDEX,
                Criterium::VALUE_COMPARISON=>1,
            ],
            [
                Criterium::ID=>3,
                Criterium::GROUP=>2,
                Criterium::OPERATOR=>1,
                Criterium::INT_VALUE=>53,
                Criterium::STRING_VALUE=>null,
                Criterium::FLOAT_VALUE=>null,
                Criterium::VALUE_TYPE=>Criterium::INT_VALUE_INDEX,
                Criterium::VALUE_COMPARISON=>2,
            ],
            [
                Criterium::ID=>4,
                Criterium::GROUP=>3,
                Criterium::OPERATOR=>1,
                Criterium::INT_VALUE=>null,
                Criterium::STRING_VALUE=>"7",
                Criterium::FLOAT_VALUE=>null,
                Criterium::VALUE_TYPE=>1,
                Criterium::VALUE_COMPARISON=>2,
            ],
            [
                Criterium::ID=>5,
                Criterium::GROUP=>5,
                Criterium::OPERATOR=>1,
                Criterium::INT_VALUE=>null,
                Criterium::STRING_VALUE=>"101280",
                Criterium::FLOAT_VALUE=>null,
                Criterium::VALUE_TYPE=>1,
                Criterium::VALUE_COMPARISON=>4,
            ],
            [
                Criterium::ID=>6,
                Criterium::GROUP=>6,
                Criterium::OPERATOR=>1,
                Criterium::INT_VALUE=>null,
                Criterium::STRING_VALUE=>"CN",
                Criterium::FLOAT_VALUE=>null,
                Criterium::VALUE_TYPE=>Criterium::STRING_VALUE_INDEX,
                Criterium::VALUE_COMPARISON=>2,
            ],
            [
                Criterium::ID=>7,
                Criterium::GROUP=>6,
                Criterium::OPERATOR=>1,
                Criterium::INT_VALUE=>null,
                Criterium::STRING_VALUE=>"RU",
                Criterium::FLOAT_VALUE=>null,
                Criterium::VALUE_TYPE=>Criterium::STRING_VALUE_INDEX,
                Criterium::VALUE_COMPARISON=>2,
            ],
        ]);
    }
}
