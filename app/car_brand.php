<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_brand extends Model {
    protected $table ='car_brand';
    protected $fillable=['name_ar','name_en'];
}
