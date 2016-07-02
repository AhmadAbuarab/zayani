<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgToCarmodeloffer extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('cars_model', function (Blueprint $table) {
            $table->string('img_slider_slider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('cars_model', function (Blueprint $table) {
            //
        });
    }

}
