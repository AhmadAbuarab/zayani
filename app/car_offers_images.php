<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_offers_images extends Model {

    protected $table = 'car_offers_images';
    protected $fillable = ['car_offer_id', 'path','path_slider'];

}
