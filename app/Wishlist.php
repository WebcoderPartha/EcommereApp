<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

    protected $fillable = ['user_id', 'product_id'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }


}
