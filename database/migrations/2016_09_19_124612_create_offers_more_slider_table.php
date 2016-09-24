<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersMoreSliderTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('offers_more_slider', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('car_model_id')->unsigned()->nullable();
            $table->foreign('car_model_id')->references('id')->on('car_model_main');
            
            $table->string('slider_arabic', 255);
            $table->string('slider_english', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('offers_more_slider');
    }

}
