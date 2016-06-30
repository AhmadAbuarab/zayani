<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsModelTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cars_model', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars');

            $table->integer('car_model_id')->unsigned()->nullable();
            $table->foreign('car_model_id')->references('id')->on('car_model_main');

            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('img_slider')->nullable();

            $table->string('engine')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('model_year')->nullable();
            $table->string('paint_colour')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('body_style')->nullable();
            $table->string('mileage')->nullable();
            $table->string('num_of_doors')->nullable();
            $table->string('power')->nullable();
            $table->string('hand_of_drive')->nullable();
            $table->string('torque')->nullable();
            $table->string('maximum_speed')->nullable();
            $table->string('acceleration')->nullable();
            $table->string('transmission')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cars_model');
    }

}
