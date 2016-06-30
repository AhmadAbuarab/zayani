<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_us extends Model {

    protected $table = 'contact_us';
    protected $fillable = [
        'feed_back_ar', 'feed_back_en', 'address_ar','address_en','po_box_ar','po_box_en',
        'telephone','showroom_openning_hours','servuce_and_parts_openning_hours','email',
        'mobile'
    ];

}
