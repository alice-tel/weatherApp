<?php

namespace Database\Seeders;

use App\Models\Geolocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeolocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public
    function run(): void
    {
        Geolocation::create(['id'=>5050,'station_name'=>"538680",'country_code'=>"CL",'state'=>"Región de Atacama"]);
        Geolocation::create(['id'=>4312,'station_name'=>"800970",'country_code'=>"CO",'state'=>"Norte de Santander"]);
        Geolocation::create(['id'=>2966,'station_name'=>"804280",'country_code'=>"VE",'state'=>"Portuguesa"]);
        Geolocation::create(['id'=>154,'station_name'=>"810020",'country_code'=>"GY",'state'=>"Demerara-Mahaica"]);
        Geolocation::create(['id'=>2707,'station_name'=>"820990",'country_code'=>"BR",'state'=>"Amapá"]);
        Geolocation::create(['id'=>2663,'station_name'=>"821110",'country_code'=>"BR",'state'=>"Amazonas"]);
        Geolocation::create(['id'=>3195,'station_name'=>"821930",'country_code'=>"BR",'state'=>"Pará"]);
        Geolocation::create(['id'=>3379,'station_name'=>"822440",'country_code'=>"BR",'state'=>"Pará"]);
        Geolocation::create(['id'=>3529,'station_name'=>"822810",'country_code'=>"BR",'state'=>"Maranhão"]);
        Geolocation::create(['id'=>3547,'station_name'=>"822880",'country_code'=>"BR",'state'=>"Piauí"]);
        Geolocation::create(['id'=>3468,'station_name'=>"823170",'country_code'=>"BR",'state'=>"Amazonas"]);
        Geolocation::create(['id'=>1240,'station_name'=>"825990",'country_code'=>"BR",'state'=>"Rio Grande do Norte"]);
        Geolocation::create(['id'=>3746,'station_name'=>"832080",'country_code'=>"BR",'state'=>"Rondônia"]);
        Geolocation::create(['id'=>2580,'station_name'=>"835760",'country_code'=>"BR",'state'=>"Minas Gerais"]);
        Geolocation::create(['id'=>2030,'station_name'=>"837030",'country_code'=>"BR",'state'=>"Mato Grosso do Sul"]);
        Geolocation::create(['id'=>3370,'station_name'=>"837753",'country_code'=>"BR",'state'=>"São Paulo"]);
        Geolocation::create(['id'=>591,'station_name'=>"839810",'country_code'=>"BR",'state'=>"Rio Grande do Sul"]);
        Geolocation::create(['id'=>1301,'station_name'=>"843770",'country_code'=>"PE",'state'=>"Loreto"]);
        Geolocation::create(['id'=>7432,'station_name'=>"846860",'country_code'=>"PE",'state'=>"Cusco"]);
        Geolocation::create(['id'=>1251,'station_name'=>"852010",'country_code'=>"BO",'state'=>"La Paz"]);
        Geolocation::create(['id'=>118,'station_name'=>"854860",'country_code'=>"CL",'state'=>"Región de Atacama"]);
        Geolocation::create(['id'=>2760,'station_name'=>"859340",'country_code'=>"CL",'state'=>"Región de Magallanes y de la Antártica Chilena"]);
        Geolocation::create(['id'=>7114,'station_name'=>"864400",'country_code'=>"UY",'state'=>"Cerro Largo"]);
        Geolocation::create(['id'=>7976,'station_name'=>"865823",'country_code'=>"UY",'state'=>"Maldonado"]);
        Geolocation::create(['id'=>707,'station_name'=>"871200",'country_code'=>"AR",'state'=>"Tucumán"]);
        Geolocation::create(['id'=>164,'station_name'=>"872220",'country_code'=>"AR",'state'=>"Catamarca"]);
        Geolocation::create(['id'=>3118,'station_name'=>"873490",'country_code'=>"AR",'state'=>"Córdoba"]);
        Geolocation::create(['id'=>2660,'station_name'=>"874800",'country_code'=>"AR",'state'=>"Santa Fe"]);
        Geolocation::create(['id'=>2295,'station_name'=>"875760",'country_code'=>"AR",'state'=>"Buenos Aires"]);
        Geolocation::create(['id'=>1971,'station_name'=>"876420",'country_code'=>"AR",'state'=>"Buenos Aires"]);
        Geolocation::create(['id'=>1987,'station_name'=>"876450",'country_code'=>"AR",'state'=>"Buenos Aires"]);
        Geolocation::create(['id'=>1996,'station_name'=>"876480",'country_code'=>"AR",'state'=>"Buenos Aires"]);
        Geolocation::create(['id'=>5328,'station_name'=>"876880",'country_code'=>"AR",'state'=>"Buenos Aires"]);
        Geolocation::create(['id'=>5346,'station_name'=>"876920",'country_code'=>"AR",'state'=>"Buenos Aires"]);
        Geolocation::create(['id'=>5452,'station_name'=>"877150",'country_code'=>"AR",'state'=>"Neuquén"]);
        Geolocation::create(['id'=>5626,'station_name'=>"877500",'country_code'=>"AR",'state'=>"Buenos Aires"]);
        Geolocation::create(['id'=>4640,'station_name'=>"877650",'country_code'=>"AR",'state'=>"Río Negro"]);
        Geolocation::create(['id'=>4806,'station_name'=>"877840",'country_code'=>"AR",'state'=>"Río Negro"]);
        Geolocation::create(['id'=>4422,'station_name'=>"879040",'country_code'=>"AR",'state'=>"Santa Cruz"]);
    }
}
