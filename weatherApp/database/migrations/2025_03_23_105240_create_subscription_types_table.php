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
        Schema::create('subscription_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('description', 256)->nullable();
            $table->integer('nr_stations')->nullable();
            $table->integer('frequency_in_hours')->nullable();
            $table->integer('frequency_in_days')->nullable();
            $table->boolean('continuous')->nullable();
            $table->float('price_per_station');
            $table->date('valid_through')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_types');
    }
};
