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
        Schema::create('nearest_locations', function (Blueprint $table) {
            $table->id();
            $table->string('station_name', 10);
            $table->string('name', 100);
            $table->string('administrative_region', 100)->nullable();
            $table->string('administrative_region2', 100)->nullable();
            $table->string('country_code', 2);
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();

            $table->foreign('station_name')->references('name')->on('stations');
            $table->foreign('country_code')->references('country_code')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nearest_locations');
    }
};
