<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarpoolReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_user_id');
            $table->integer('to_user_id');
            $table->integer('booking_num');
            $table->integer('rides');
            $table->integer('roles');
            $table->float('rating');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpool_reviews');
    }
}
