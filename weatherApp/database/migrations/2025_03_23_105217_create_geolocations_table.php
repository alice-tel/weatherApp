<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('geolocations', function (Blueprint $table) {
            $table->id();
            $table->string('station_name', 10);
            $table->string('country_code', 2)->nullable();
            $table->string('island', 100)->nullable();
            $table->string('county', 100)->nullable();
            $table->string('place', 100)->nullable();
            $table->string('hamlet', 100)->nullable();
            $table->string('town', 100)->nullable();
            $table->string('municipality', 100)->nullable();
            $table->string('state_district', 100)->nullable();
            $table->string('administrative', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('village', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('locality', 100)->nullable();
            $table->string('postcode', 100)->nullable();
            $table->string('country', 100)->nullable();

            $table->foreign('station_name')->references('name')->on('stations');
            $table->foreign('country_code')->references('country_code')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geolocations');
    }
};
