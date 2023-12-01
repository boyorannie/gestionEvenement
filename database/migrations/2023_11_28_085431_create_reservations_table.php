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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->integer('nombrePlace');
            $table->enum('statut',['acceptée', 'refusée'])->default('acceptée');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('evenement_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('evenement_id')->references('id')->on('evenements');

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
