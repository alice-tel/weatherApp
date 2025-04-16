<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionStationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("subscription_stations")->insert([
            [
                "subscription"=> 5,
                "station"=>'102240',
            ],
            [
                "subscription"=>8,
                "station"=>'20500',
            ],
            [
                "subscription"=>8,
                "station"=>'21730',
            ],
            [
                "subscription"=>8,
                "station"=>'28360',
            ],
            [
                "subscription"=>8,
                "station"=>'29430',
            ],
            [
                "subscription"=>9,
                "station"=>'30890',
            ],
            [
                "subscription"=>4,
                "station"=>'62000',
            ],
            [
                "subscription"=>1,
                "station"=>'62250',
            ],
            [
                "subscription"=>1,
                "station"=>'62350',
            ],
            [
                "subscription"=>6,
                "station"=>'62390',
            ],
            [
                "subscription"=>1,
                "station"=>'62400',
            ],
            [
                "subscription"=>2,
                "station"=>'62500',
            ],
            [
                "subscription"=>3,
                "station"=>'62500',
            ],
            [
                "subscription"=>4,
                "station"=>'62600',
            ],
            [
                "subscription"=>7,
                "station"=>'62670',
            ],
            [
                "subscription"=>2,
                "station"=>'62680',
            ],
            [
                "subscription"=>3,
                "station"=>'62680',
            ],
            [
                "subscription"=>2,
                "station"=>'62690',
            ],
            [
                "subscription"=>2,
                "station"=>'62790',
            ],
            [
                "subscription"=>3,
                "station"=>'62790',
            ],
            [
                "subscription"=>4,
                "station"=>'62790',
            ],
            [
                "subscription"=>2,
                "station"=>'62800',
            ],
            [
                "subscription"=>3,
                "station"=>'62800',
            ],
            [
                "subscription"=>4,
                "station"=>'62800',
            ],
            [
                "subscription"=>1,
                "station"=>'63300',
            ],
            [
                "subscription"=>10,
                "station"=>'70150',
            ],
            [
                "subscription"=>10,
                "station"=>'74820',
            ],

        ]);
    }
}
