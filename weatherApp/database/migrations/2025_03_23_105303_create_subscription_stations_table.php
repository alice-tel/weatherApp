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
        Schema::create('subscription_stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription');
            $table->string('station', 10);

            $table->foreign('subscription')->references('id')->on('subscriptions');
            $table->foreign('station')->references('name')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_stations');
    }
};
