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
        Schema::create('original_measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corrected_measurement');
            $table->string('missing_field', 32)->nullable();
            $table->float('invalid_temperature')->nullable();

            $table->foreign('corrected_measurement')->references('id')->on('measurements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('original_measurements');
    }
};
