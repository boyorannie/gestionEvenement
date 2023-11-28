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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date_limite_inscription');
            $table->string('description');
            $table->string('image_mise_en_avant');
            $table->enum('statut',['ouvert', 'cloture'])->default('ouvert');
            $table->date('date_evenement');
            $table->unsignedBigInteger('association_id');
            $table->foreign('association_id')->references('id')->on('associations');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('evenements', function (Blueprint $table) {
        $table->dropColumn('statut');
    });
}

};
