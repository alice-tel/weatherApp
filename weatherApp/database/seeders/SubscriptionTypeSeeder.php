<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("subscription_types")->insert([
            [
                'id'=>1,
                'name'=>'Starter',
                'description'=>'Allows viewing one station that updates every 2 hours',
                'nr_stations'=>1,
                'frequency_in_hours'=>2,
                'frequency_in_days'=>0,
                'continuous'=>0,
                'price_per_station'=>20,
                "valid_through"=>NULL,
            ],
            [
                "id"=> 11,
                "name"=>'SIMPLE',
                "description"=>'Eenvoudig abonnement voor dagelijkse update van gegevens voor 1 station',
                "nr_stations"=>1,
                "frequency_in_hours"=>NULL,
                "frequency_in_days"=>1,
                "continuous"=>0,
                "price_per_station"=>49,
                "valid_through"=>NULL,
            ],
            [
                "id"=>12,
                "name"=>'BUDGET',
                "description"=>'Goedkoop abonnement voor weekelijkse informatie',
                "nr_stations"=>1,
                "frequency_in_hours"=>NULL,
                "frequency_in_days"=>7,
                "continuous"=>0,
                "price_per_station"=>24.99,
                "valid_through"=>NULL,
            ],
            [
                "id"=>13,
                "name"=>'STREAM',
                "description"=>'Live data voor 1 station',
                "nr_stations"=>1,
                "frequency_in_hours"=>NULL,
                "frequency_in_days"=>NULL,
                "continuous"=>1,
                "price_per_station"=>115.76,
                "valid_through"=>NULL,
            ],
            [
                "id"=>14,
                "name"=>'SIMPLE+',
                "description"=>'Eenvoudig abonnement voor 1 station met data per uur',
                "nr_stations"=>1,
                "frequency_in_hours"=>1,
                "frequency_in_days"=>NULL,
                "continuous"=>0,
                "price_per_station"=>65,
                "valid_through"=>NULL,
            ],
            [
                "id"=>15,
                "name"=>'GROUP',
                "description"=>'Weekelijkse data voor meerdere stations',
                "nr_stations"=>NULL,
                "frequency_in_hours"=>NULL,
                "frequency_in_days"=>7,
                "continuous"=>0,
                "price_per_station"=>23.5,
                "valid_through"=>NULL,
            ],
            [
                "id"=>16,
                "name"=>'GROUP+',
                "description"=>'Dagelijkse data voor meerdere stations',
                "nr_stations"=>NULL,
                "frequency_in_hours"=>NULL,
                "frequency_in_days"=>1,
                "continuous"=>0,
                "price_per_station"=>28.25,
                "valid_through"=>NULL,
            ],
            [
                "id"=>17,
                "name"=>'GROUP++',
                "description"=>'Data elk uur voor meerdere stations',
                "nr_stations"=>NULL,
                "frequency_in_hours"=>1,
                "frequency_in_days"=>NULL,
                "continuous"=>NULL,
                "price_per_station"=>47.65,
                "valid_through"=>NULL,
            ],

        ]);
    }
}
