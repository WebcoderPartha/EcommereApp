<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{

    protected $fillable = [
        'phone_one',
        'phone_two',
        'email',
        'company_name',
        'company_address',
        'facebook',
        'youtube',
        'instagram',
        'twitter',
    ];

}
