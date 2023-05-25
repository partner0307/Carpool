<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarpoolRewards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon');
            $table->string('title');
            $table->tinyText('description');
            $table->integer('points');
            $table->double('amount');
            $table->string('coupon');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpool_rewards');
    }
}
