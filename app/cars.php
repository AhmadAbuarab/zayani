<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cars extends Model {
    protected $table = 'cars';
    protected $fillable = [
        'name_ar', 'name_en', 'slider_img', 'main_img'
    ];

}
