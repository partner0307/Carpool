<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarpoolPromoCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_promo_code', function (Blueprint $table) {
            $table->increments('id');
            $table->string('promo_code');
            $table->double('usage_limit_user');
            $table->text('description');
            $table->double('min_order_amount');
            $table->double('max_discount_amount');
            $table->double('discount');
            $table->string('usertype');
            $table->string('discount_type');
            $table->datetime('expire_date');
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
        Schema::dropIfExists('carpool_promo_code');
    }
}
