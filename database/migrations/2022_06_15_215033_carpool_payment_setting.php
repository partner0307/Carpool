<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarpoolPaymentSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_payment_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('icon');
            $table->integer('type');
            $table->string('public_key');
            $table->string('private_key');
            $table->string('salt_key');
            $table->string('merchantId');
            $table->string('cclw');
            $table->string('cclw');
            $table->integer('driver_plan');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpool_payment_setting');
    }
}
