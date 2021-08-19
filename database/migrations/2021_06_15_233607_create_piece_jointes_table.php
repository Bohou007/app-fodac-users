<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceJointesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_jointes', function (Blueprint $table) {
            $table->id();
            $table->string('name_doc');
            $table->string('type_doc');
            $table->string('path_doc');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('piece_jointes', function($table) {
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
        Schema::dropIfExists('piece_jointes');
    }
}
