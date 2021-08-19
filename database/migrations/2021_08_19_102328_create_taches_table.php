<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('dossiers_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('assign_id');
            $table->timestamps();
        });

        Schema::table('taches', function($table) {
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
        Schema::dropIfExists('taches');
    }
}
