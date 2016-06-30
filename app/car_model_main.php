<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_model_main extends Model
{
    protected $table='car_model_main';
    protected $fillable=['car_id','car_model_main_name_en','car_model_main_name_ar'];
}
