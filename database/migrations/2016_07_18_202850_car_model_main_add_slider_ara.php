<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarModelMainAddSliderAra extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('car_model_main', function (Blueprint $table) {
            $table->string('slider_ara');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('car_model_main', function (Blueprint $table) {
            //
        });
    }

}
