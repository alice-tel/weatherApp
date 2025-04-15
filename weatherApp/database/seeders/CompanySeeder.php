<?php

namespace Database\Seeders;

use App\Models\Query;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("companies")->insert([
            [
                "id"=>10,
                "name"=>'Schiphol Airport',
                "city"=>'Schiphol',
                "street"=>'Aankomstpassage',
                "number"=>1,
                "number_additional"=>NULL,
                "zip_code"=>'1118AX',
                "country"=>'NL',
                "email"=>'schiphol@schiphol.nl'
            ],
            [
                "id"=>11,
                "name"=>'Eelde Groningen Airport',
                "city"=>'Eelde',
                "street"=>'Machlaan',
                "number"=>14,
                "number_additional"=>'A',
                "zip_code"=>'9761TK',
                "country"=>'NL',
                "email"=>'groningenAirport@eeldeairport.nl'
            ],
            [
                "id"=>12,
                "name"=>'KNMI weerstation Eelde',
                "city"=>'Eelde',
                "street"=>'Burgemeester J.G. Legroweg',
                "number"=>35,
                "number_additional"=>NULL,
                "zip_code"=>'9761KT',
                "country"=>'NL',
                "email"=>'knmi@eeldeairport.nl'
            ],
            [
                "id"=>13,
                "name"=>'HSB Hochschule Bremen',
                "city"=>'Bremen',
                "street"=>'Neustadtswall',
                "number"=>30,
                "number_additional"=>NULL,
                "zip_code"=>'28199',
                "country"=>'DE',
                "email"=>'wetter@hsb.bremen.de'
            ],
            [
                "id"=>14,
                "name"=>'Hanze',
                "city"=>'Groningen',
                "street"=>'Zernikepark',
                "number"=>7,
                "number_additional"=>NULL,
                "zip_code"=>'9747AK',
                "country"=>'NL',
                "email"=>'info@hanze.nl'
            ],
            [
                "id"=>15,
                "name"=>'Rijksuniversiteit Groningen',
                "city"=>'Groningen',
                "street"=>'Broerstraat',
                "number"=>5,
                "number_additional"=>NULL,
                "zip_code"=>'9712CP',
                "country"=>'NL',
                "email"=>'rectormag@rug.nl'
            ],
            [
                "id"=>16,
                "name"=>'SHELL Campus Den Haag',
                "city"=>'Den Haag',
                "street"=>'Carel van Bylantlaan',
                "number"=>16,
                "number_additional"=>NULL,
                "zip_code"=>'2596HR',
                "country"=>'NL',
                "email"=>'weerdienst@shell.nl'
            ],
            [
                "id"=>17,
                "name"=>'Oxford University',
                "city"=>'Oxford',
                "street"=>'Wellington Square',
                "number"=>1,
                "number_additional"=>NULL,
                "zip_code"=>'OX1 2JD',
                "country"=>'GB',
                "email"=>'weather@oxforduni.co.uk'
            ],
            [
                "id"=>18,
                "name"=>'Hapag-LLoyd',
                "city"=>'Parijs',
                "street"=>'QUAI DU DOCTEUR DERVAUX',
                "number"=>99,
                "number_additional"=>NULL,
                "zip_code"=>'92600',
                "country"=>'FR',
                "email"=>'transport@hplloyd.fr'
            ],
        ]);

    }
}
