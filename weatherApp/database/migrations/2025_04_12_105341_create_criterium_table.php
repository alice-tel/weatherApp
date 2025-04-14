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
        Schema::create('criterium', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group');
            $table->unsignedBigInteger('operator');
            $table->integer('int_value')->nullable();
            $table->string('string_value', 45)->nullable();
            $table->float('float_value')->nullable();
            $table->integer('value_type')->nullable();
            $table->unsignedBigInteger('value_comparison');

            $table->foreign('group')->references('id')->on('criterium_group');
            $table->foreign('operator')->references('id')->on('operator_type');
            $table->foreign('value_comparison')->references('id')->on('comparison_operator_type');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterium');
    }
};
