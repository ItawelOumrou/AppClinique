<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriquesRenvezVousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiques_renvez_vous', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPatient');
            $table->integer('idMedecin');
            $table->date('datePrendreRV');
            $table->date('dateRendezVous');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historiques_renvez_vous');
    }
}
