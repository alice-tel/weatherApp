<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Test',
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'employee_code' => 'admintest1',
                'user_role' => 6,
                'password' => Hash::make('admintest'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'first_name' => 'Test',
                'name' => 'TM',
                'email' => 'tm222@test.com',
                'employee_code' => 'techmedewe',
                'user_role' => 1,
                'password' => Hash::make('technisch2'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'first_name' => 'Test',
                'name' => 'TO',
                'email' => 'to333@test.com',
                'employee_code' => 'techonderz',
                'user_role' => 2,
                'password' => Hash::make('onderzoek3'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'first_name' => 'Test',
                'name' => 'CM',
                'email' => 'cm444@test.com',
                'employee_code' => 'commermede',
                'user_role' => 3,
                'password' => Hash::make('commercieel4'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'first_name' => 'test',
                'name' => 'Admin',
                'email' => 'test@test.com',
                'employee_code' => 'admintest2',
                'user_role' => 6,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
