<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePjDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_jointes_dossiers', function (Blueprint $table) {
            $table->id();
            $table->integer('dossiers_id')->unsigned()->index();
            $table->integer('piece_jointe_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('piece_jointes_dossiers', function($table) {
            $table->foreign('dossiers_id')
              ->references('id')
              ->on('dossiers')->onDelete('cascade');
            $table->foreign('piece_jointe_id')
              ->references('id')
              ->on('piece_jointes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pj_dossiers');
    }
}
