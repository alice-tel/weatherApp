<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('user_roles')->insert([[
            'id'=>1,
            'role'=>'admin',
            'description'=>'Admin'
        ],[
            'id'=>2,
            'role'=>'TM',
            'description'=>'Technische medewerker IWA'
        ],[
            'id'=>3,
            'role'=>'TO',
            'description'=>'Technische onderzoeker IWA'
        ],[
           'id'=>4,
           'role'=>'CM',
           'description'=>'Commercieel medewerker IWA'
        ]]);

        $users = [
                [
                    'first_name' => 'Test',
                    'name' => 'Admin',
                    'email' => 'admin@test.com',
                    'employee_code' => 'admintest1',
                    'user_role' => 1,
                    'password' => Hash::make('admintest'),
                ],[
                    'first_name' => 'Test',
                    'name' => 'TM',
                    'email' => 'tm222@test.com',
                    'employee_code' => 'techmedewe',
                    'user_role' => 2,
                    'password' => Hash::make('technisch2'),
                ],[
                    'first_name' => 'Test',
                    'name' => 'TO',
                    'email' => 'to333@test.com',
                    'employee_code' => 'techonderz',
                    'user_role' => 3,
                    'password' => Hash::make('onderzoek3'),
                ],[
                    'first_name' => 'Test',
                    'name' => 'CM',
                    'email' => 'cm444@test.com',
                    'employee_code' => 'commermede',
                    'user_role' => 4,
                    'password' => Hash::make('commercieel4'),
                ]
            ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
