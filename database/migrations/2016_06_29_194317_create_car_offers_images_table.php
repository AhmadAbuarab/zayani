<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarOffersImagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('car_offers_images', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('car_offer_id')->unsigned()->nullable();
            $table->foreign('car_offer_id')->references('id')->on('cars_model');


            $table->string('path', 2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('car_offers_images');
    }

}
