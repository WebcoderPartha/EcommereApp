<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'product_name',
        'product_code',
        'product_quantity',
        'product_details',
        'product_color',
        'product_size',
        'selling_prize',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trend',
        'buyone_getone',
        'image_one',
        'image_two',
        'image_three',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

//    public function wishlist(){
//        return $this->belongsTo(Wishlist::class);
//    }

}
