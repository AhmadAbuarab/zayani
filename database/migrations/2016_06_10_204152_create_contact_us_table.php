<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('feed_back_ar',2000)->nullable();
            $table->string('feed_back_en',2000)->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->string('po_box_ar')->nullable();
            $table->string('po_box_en')->nullable();
            $table->string('telephone')->nullable();
            $table->string('showroom_openning_hours')->nullable();
            $table->string('servuce_and_parts_openning_hours')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('contact_us');
    }

}
