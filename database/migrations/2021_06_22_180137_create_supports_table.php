<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('objet');
            $table->text('message');
            $table->text('reponse')->nullable();
            $table->string('to');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('supports', function($table) {
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
        Schema::dropIfExists('supports');
    }
}
