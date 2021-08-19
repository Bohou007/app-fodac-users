<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('budget_oc');
            $table->string('capitale_oc');
            $table->string('capitale_demander');
            $table->string('status');
            $table->integer('approuve')->nullable();
            $table->string('fond_fodac')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('dossiers', function($table) {
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
        Schema::dropIfExists('dossiers');
    }
}
