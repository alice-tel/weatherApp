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
        Schema::create('endpoint_activities', function (Blueprint $table) {
            $table->id();
            $table->string('identifier', 45);
            $table->string('endpoint_used', 256);
            $table->integer('files_downloaded')->nullable();
            $table->date('activity_date');
            $table->time('activity_time');
            $table->boolean('authorized')->default(true);
            $table->integer('data_transferred')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endpoint_activities');
    }
};
