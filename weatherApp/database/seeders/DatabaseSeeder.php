<?php

namespace Database\Seeders;

use App\Models\Geolocation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CountrySeeder::class,
            CompanySeeder::class,
            RelationsSeeder::class,
            EndpointActivitiesSeeder::class,
            StationsSeeder::class,
            NearestLocationsSeeder::class,
            SubscriptionTypeSeeder::class,
            SubscriptionsSeeder::class,
            SubscriptionStationsSeeder::class,
            ContractSeeder::class,
            OperatorTypeSeeder::class,
            ComparisonOperatorTypeSeeder::class,
            CriteriumTypeSeeder::class,
            QuerySeeder::class,
            CriteriumGroupSeeder::class,
            CriteriumSeeder::class,
            AdminSeeder::class,
            GeolocationsSeeder::class,
        ]);

    }
}
