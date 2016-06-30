<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelMainTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('car_model_main', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars');
            
            $table->string('car_model_main_name_en');
            $table->string('car_model_main_name_ar');
            $table->string('slider_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('car_model_main');
    }

}
