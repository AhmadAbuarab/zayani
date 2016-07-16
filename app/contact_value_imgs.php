<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_value_imgs extends Model {

    protected $table = 'contact_value_imgs';
    protected $fillable = ['contact_slider_arabic', 'contact_slider_english', 'value_slider_arabic', 'value_slider_english'];

}
