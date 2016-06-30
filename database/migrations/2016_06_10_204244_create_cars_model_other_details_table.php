<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsModelOtherDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cars_model_other_details_model', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars');

            $table->integer('car_model_id')->unsigned()->nullable();
            $table->foreign('car_model_id')->references('id')->on('cars_model');
            
            $table->string('detail_ar')->nullable();
            $table->string('detail_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cars_model_other_details_model');
    }

}
