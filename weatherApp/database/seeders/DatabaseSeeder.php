<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserRole;
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
            CompanySeeder::class,
            ContractSeeder::class,
            OperatorTypeSeeder::class,
            ComparisonOperatorTypeSeeder::class,
            CriteriumTypeSeeder::class,
            QuerySeeder::class,
            CriteriumGroupSeeder::class,
            CriteriumSeeder::class,
            SubscriptionTypeSeeder::class,
            AdminSeeder::class,
        ]);

    }
}
