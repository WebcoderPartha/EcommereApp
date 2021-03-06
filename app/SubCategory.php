<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['subcategory_name', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function product(){
        return $this->hasMany(Product::class);
    }
}
