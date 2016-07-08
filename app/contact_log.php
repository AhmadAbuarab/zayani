<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_log extends Model {

    protected $table = 'contact_log';
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile_number', 'phone_number', 'subject', 'message'];

}
