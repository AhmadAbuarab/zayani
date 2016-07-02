<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_brand_model extends Model {

    protected $table = 'car_brand_model';
    protected $fillable = ['name_ar', 'name_en', 'brand_id'];

}
