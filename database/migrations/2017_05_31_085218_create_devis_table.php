<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('id')->references('client_id')->on('client');
            $table->string('tel',60);
            $table->string('email')->unique();
            $table->enum('situation', array('décés', 'non décés'));
            $table->string('ville_de_deces',60);
            $table->date('date_de_deces',60);
            $table->string('lieu_de_deces');
            $table->enum('mode_de_sépulture', array('inhumation', 'crémation','rapatriement'));
            $table->string('destination_de_defunt',60);
            $table->enum('ceremonie', array('aucune ceremonie', 'ceremonie catholique','ceremonie musulmane','ceremonie juive'));
            $table->enum('option', array('faire-part', 'parution presse','soins de conservation','toilette mortuaire','registre de souvenirs'));
            $table->string('observation', 260);
            $table->date('start-time')->nullable();
            $table->date('deadline')->nullable();
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
        Schema::dropIfExists('devis');
    }
}
