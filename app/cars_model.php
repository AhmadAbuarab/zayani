<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cars_model extends Model {

    protected $table = 'cars_model';
    protected $fillable = [
        'car_id', 'name_ar', 'name_en', 'engine', 'fuel_type', 'model_year', 'paint_colour', 'interior_color'
        , 'body_style', 'mileage', 'num_of_doors', 'power', 'hand_of_drive', 'torque', 'maximum_speed', 'acceleration'
        , 'transmission', 'price', 'img_slider', 'car_model_id', 'img_slider_slider'
    ];

}
