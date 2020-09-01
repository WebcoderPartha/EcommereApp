<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'paying_amount',
        'balance_transaction',
        'payment_type',
        'order_id',
        'discount',
        'vat',
        'shipping_charge',
        'subtotal',
        'total',
        'status',
        'return_order',
        'date',
        'month',
        'year',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderdetail(){
        return $this->hasMany(Orderdetail::class);
    }

    public function shippingdetail(){
        return $this->hasMany(Shipping::class);
    }


}
