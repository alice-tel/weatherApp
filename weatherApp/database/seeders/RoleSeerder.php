<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([[
            'id' => 1,
            'role' => 'Technisch medewerker',
            'description' => 'Medewerker van de afdeling monitoring en beheer'
        ], [
            'id' => 2,
            'role' => 'Technisch onderzoeker',
            'description' => 'Medewerker van de afdeling anaylise en datamining'
        ], [
            'id' => 3,
            'role' => 'Commercieel medewerker',
            'description' => 'Medewerker van de afdeling marketing en klant beheer'
        ], [
            'id' => 4,
            'role' => 'Administratief medewerker',
            'description' => 'Medewerker van de afdeling personeelszaken'
        ], [
            'id' => 5,
            'role' => 'Technisch beheer',
            'description' => 'Medewerker van de afdeling IT-support'
        ], [
            'id' => 6,
            'role' => 'Administrator',
            'description' => 'Super user'
        ]]);
    }
}
