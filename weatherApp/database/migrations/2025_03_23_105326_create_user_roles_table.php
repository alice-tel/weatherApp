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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role', 45);
            $table->string('description', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
ublic function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_role']); // Drop the foreign key first
        });

        Schema::dropIfExists('user_roles'); // Now, drop the table safely
    }
};
