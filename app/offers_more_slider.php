<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offers_more_slider extends Model {

    protected $table = 'offers_more_slider';
    protected $fillable = ['car_model_id', 'slider_arabic', 'slider_english'];

}
