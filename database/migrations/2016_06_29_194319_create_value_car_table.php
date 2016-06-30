<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValueCarTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('value_car', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('car_brand');
            
            $table->integer('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('car_brand_model');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('best_time_to_contact');
            $table->string('ownership_year');
            $table->string('year');
            $table->string('body_condition');
            $table->string('engine_condition');
            $table->string('ac_condition');
            $table->string('mileage');
            $table->string('gear_condition');
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('value_car');
    }

}
