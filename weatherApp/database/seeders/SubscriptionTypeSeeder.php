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
        DB::table('subscription_types')->insert([
            'id'=>1,
            'name'=>'Starter',
            'description'=>'Allows viewing one station that updates every 2 hours',
            'nr_stations'=>1,
            'frequency_in_hours'=>2,
            'frequency_in_days'=>0,
            'continuous'=>0,
            'price_per_station'=>20
            // valid_through date is nullable.
        ]);
    }
}
