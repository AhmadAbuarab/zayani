<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactValueImgsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contact_value_imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_slider_arabic', 255);
            $table->string('contact_slider_english', 255);
            $table->string('value_slider_arabic', 255);
            $table->string('value_slider_english', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('contact_value_imgs');
    }

}
