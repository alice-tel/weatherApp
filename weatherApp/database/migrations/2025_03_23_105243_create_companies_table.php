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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('city', 100)->nullable();
            $table->string('street', 100)->nullable();
            $table->integer('number')->nullable();
            $table->string('number_additional', 15)->nullable();
            $table->string('zip_code', 15)->nullable();
            $table->string('country', 2);
            $table->string('email', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
