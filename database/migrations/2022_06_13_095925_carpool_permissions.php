<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarpoolPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpool_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('navheader');
            $table->string('url');
            $table->string('name');
            $table->string('icon');
            $table->string('slug');
            $table->string('submenu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpool_permissions');
    }
}
