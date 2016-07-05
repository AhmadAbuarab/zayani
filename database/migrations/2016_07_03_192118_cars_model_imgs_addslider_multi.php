<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarsModelImgsAddsliderMulti extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('car_offers_images', function (Blueprint $table) {
            $table->string('path_slider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('car_offers_images', function (Blueprint $table) {
            //
        });
    }

}
