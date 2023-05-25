<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarpoolRides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_rides', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_issue');
            $table->integer('user_id');
            $table->string('payment');
            $table->string('pickup');
            $table->string('arrival');
            $table->integer('trip_type');
            $table->integer('seats');
            $table->double('amount');
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
        Schema::dropIfExists('carpool_rides');
    }
}
