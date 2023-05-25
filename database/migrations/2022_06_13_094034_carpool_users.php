<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarpoolUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('gender');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phonenumber');
            $table->string('photo')->nullable();
            $table->string('company_email')->nullable();
            $table->string('id_card')->nullable();
            $table->string('license')->nullable();
            $table->double('wallet')->nullable();
            $table->integer('company')->nullable();
            $table->integer('country');
            $table->integer('role');
            $table->boolean('status');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpool_users');
    }
}
