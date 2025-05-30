<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CriteriumTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('criterium_type')->insert([
            [
                'id'=>1,
                'description'=>'Een lijst van landcodes',
                'referenced_table'=>'geolocations',
                'referenced_field'=>'country_code',
            ],
            [
                'id'=>2,
                'description'=>'Hoogte van het station',
                'referenced_table'=>'stations',
                'referenced_field'=>'elevation',
            ],
            [
                'id'=>3,
                'description'=>'Coördinaten, breedtegraad',
                'referenced_table'=>'stations',
                'referenced_field'=>'latitude',
            ],
            [
                'id'=>4,
                'description'=>'Coördinaten, lengtegraad',
                'referenced_table'=>'stations',
                'referenced_field'=>'longitude',
            ],
            [
                'id'=>5,
                'description'=>'Regiocode',
                'referenced_table'=>'nearest_locations',
                'referenced_field'=>'administrative_region',
            ],
            [
                'id'=>6,
                'description'=>'Name',
                'referenced_table'=>'stations',
                'referenced_field'=>'name',
            ],
            [
                'id'=>7,
                'description'=>'Temperature',
                'referenced_table'=>'measurements',
                'referenced_field'=>'temperature',
            ],
            [
                'id'=>8,
                'description'=>'Precipitation',
                'referenced_table'=>'measurements',
                'referenced_field'=>'precipitation',
            ],
            [
                'id'=>9,
                'description'=>'Measurements Date',
                'referenced_table'=>'measurements',
                'referenced_field'=>'date',
            ],
            [
                'id'=>10,
                'description'=>'Measurements Time',
                'referenced_table'=>'measurements',
                'referenced_field'=>'time',
            ]
         ]);
    }
}
