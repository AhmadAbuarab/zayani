<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cars_model_other_details_mode extends Model {
    protected $table='cars_model_other_details_model';
    protected $fillable=['car_id','car_model_id','detail_ar','detail_en'];
}
