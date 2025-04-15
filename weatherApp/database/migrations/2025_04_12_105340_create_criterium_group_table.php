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
        Schema::create('criterium_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('query');
            $table->unsignedBigInteger('type');
            $table->unsignedBigInteger('operator');
            $table->integer('group_level')->nullable();

            $table->foreign('query')->references('id')->on('query');
            $table->foreign('type')->references('id')->on('criterium_type');
            $table->foreign('operator')->references('id')->on('operator_type');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterium_group');
    }
};
