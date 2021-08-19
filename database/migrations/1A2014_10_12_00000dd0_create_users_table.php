<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->string('contact')->unique();
            $table->integer('profil');
            $table->string('account_type');
            $table->string('name_corporate')->nullable();
            $table->string('email_corporate')->unique()->nullable();
            $table->string('contact_corporate')->unique()->nullable();
            $table->string('regist_corporate')->unique()->nullable();
            $table->string('address_corporate')->nullable();
            $table->string('terms_conditions');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
