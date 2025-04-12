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
        Schema::create('iwa_subscription_query', function (Blueprint $table) {
            $table->id();
            $table->string('query_id'); // Verwijst naar de query
            $table->string('contract_identifier'); // Verwijst naar het contract
            $table->json('landcodes')->nullable(); // Lijst van landcodes
            $table->integer('elevation')->nullable(); // Elevatiecriteria
            $table->json('coordinates')->nullable(); // Coördinatencriteria (bijvoorbeeld breedte- en lengtegraad)
            $table->json('regions')->nullable(); // Lijst van regio's
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iwa_subscription_query');
    }

};
