<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class value_car extends Model {
    protected $table='value_car';
    protected $fillable=['brand_id','model_id','first_name','last_name','phone_number','email','best_time_to_contact',
        'ownership_year','year','body_condition','engine_condition','ac_condition','mileage','gear_condition','message'];
}
