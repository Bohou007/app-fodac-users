<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treat_dossiers', function (Blueprint $table) {
            $table->id();
            $table->integer('dossiers_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('role');
            $table->string('observation');
            $table->timestamps();
        });

        Schema::table('treat_dossiers', function($table) {
            $table->foreign('dossiers_id')
              ->references('id')
              ->on('dossiers')->onDelete('cascade');
            $table->foreign('user_id')
              ->references('id')
              ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treat_dossiers');
    }
}
