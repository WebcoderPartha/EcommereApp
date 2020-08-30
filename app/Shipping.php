<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'order_id',
        'ship_name',
        'ship_phone',
        'ship_email',
        'ship_address',
        'ship_city',
        'ship_zipecode',
        'ship_country',
    ];


    public function order(){
        return $this->belongsTo(Order::class);
    }
}
