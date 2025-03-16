<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->string('station', 10);
            $table->date('date');
            $table->time('time');
            $table->float('temperature')->nullable();
            $table->float('dewpoint_temperature')->nullable();
            $table->float('air_pressure_station')->nullable();
            $table->float('air_pressure_sea_level')->nullable();
            $table->float('visibility')->nullable();
            $table->float('wind_speed')->nullable();
            $table->float('percipation')->nullable();
            $table->float('snow_depth')->nullable();
            $table->string('conditions', 6)->nullable();
            $table->float('cloud_cover')->nullable();
            $table->integer('wind_direction')->nullable();

            $table->foreign('station')->references('name')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
