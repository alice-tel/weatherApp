<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EndpointActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("endpoint_activities")->insert([
            [
                "id"=> 1,
                "identifier"=>'HANZE14',
                "endpoint_used"=>'IWA/abonnement/HANZE14',
                "files_downloaded"=>1,
                "activity_date"=>'2025-01-15',
                "activity_time"=>'12:00:02',
                "authorized"=>1,
                "data_transferred"=>40962568,
            ],
            [
                "id"=>2,
                "identifier"=>'HANZE14',
                "endpoint_used"=>'IWA/abonnement/HANZE14',
                "files_downloaded"=>1,
                "activity_date"=>'2025-01-16',
                "activity_time"=>'09:43:23',
                "authorized"=>1,
                "data_transferred"=>40962568,
            ],
            [
                "id"=>3,
                "identifier"=>'HANZE14',
                "endpoint_used"=>'IWA/abonnement/HANZE14',
                "files_downloaded"=>1,
                "activity_date"=>'2025-01-17',
                "activity_time"=>'12:00:08',
                "authorized"=>1,
                "data_transferred"=>40962568,
            ],
            [
                "id"=>4,
                "identifier"=>'HANZE14',
                "endpoint_used"=>'IWA/abonnement/HANZE14',
                "files_downloaded"=>2,
                "activity_date"=>'2025-01-19',
                "activity_time"=>'12:00:05',
                "authorized"=>1,
                "data_transferred"=>81925136,
            ],
            [
                "id"=>5,
                "identifier"=>'HANZE14',
                "endpoint_used"=>'IWA/abonnement/HANZE14/stations',
                "files_downloaded"=>0,
                "activity_date"=>'2025-02-06',
                "activity_time"=>'10:05:41',
                "authorized"=>1,
                "data_transferred"=>16,
            ],
            [
                "id"=>6,
                "identifier"=>'OXFOR17',
                "endpoint_used"=>'IWA/abonnement',
                "files_downloaded"=>0,
                "activity_date"=>'2025-02-07',
                "activity_time"=>'01:00:05',
                "authorized"=>0,
                "data_transferred"=>0,
            ],
            [
                "id"=>7,
                "identifier"=>'OXFOR17',
                "endpoint_used"=>'IWA/abonnement/OXFOR17',
                "files_downloaded"=>1,
                "activity_date"=>'2025-02-08',
                "activity_time"=>'01:00:06',
                "authorized"=>1,
                "data_transferred"=>1281648,
            ],
            [
                "id"=>8,
                "identifier"=>'OXFOR17',
                "endpoint_used"=>'IWA/abonnement/OXFOR17',
                "files_downloaded"=>1,
                "activity_date"=>'2025-02-08',
                "activity_time"=>'02:00:06',
                "authorized"=>1,
                "data_transferred"=>1281648,
            ],

        ]);
    }
}
