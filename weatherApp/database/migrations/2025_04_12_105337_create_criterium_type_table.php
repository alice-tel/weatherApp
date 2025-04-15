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
        Schema::create('criterium_type', function (Blueprint $table) {
            $table->id();
            $table->string('description', 45)->nullable();
            $table->string('referenced_table', 45)->nullable();
            $table->string('referenced_field', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterium_type');
    }
};
