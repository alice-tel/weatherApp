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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company');
            $table->unsignedBigInteger('type');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->float('price');
            $table->string('notes', 256)->nullable();
            $table->string('identifier', 45)->nullable();
            $table->string('token', 100)->nullable();

            $table->foreign('company')->references('id')->on('companies');
            $table->foreign('type')->references('id')->on('subscription_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
