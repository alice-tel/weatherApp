<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IwaSubscriptionQuery;

class IwaSubscriptionSeeder extends Seeder
{
    public function run()
    {
        IwaSubscriptionQuery::create([
            'query_id' => 'query001',
            'contract_identifier' => 'contract123',
            'landcodes' => json_encode(['NL', 'BE']),
            'elevation' => 100,
            'coordinates' => json_encode(['lat_min' => 52.0, 'lat_max' => 53.0, 'long_min' => 4.0, 'long_max' => 5.0]),
            'regions' => json_encode(['NL-FR', 'BE-VL']),
        ]);

        IwaSubscriptionQuery::create([
            'query_id' => 'query002',
            'contract_identifier' => 'contract456',
            'landcodes' => json_encode(['UK']),
            'elevation' => 200,
            'coordinates' => json_encode(['lat_min' => 51.0, 'lat_max' => 52.0, 'long_min' => -1.0, 'long_max' => 0.0]),
            'regions' => json_encode(['UK-ENG']),
        ]);
    }
}
