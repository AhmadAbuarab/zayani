<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test_drive extends Model {
    protected $table='test_drive';
    protected $fillable=['car_model_offer_id','first_name','last_name','email','phone_number','best_time_to_contact','message'];
}
