<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'stock',
        'summary',
        'description',
        'discount',
        'vendor_id',
        'category_id',
    ];

    public function categroy(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function cartItem(){
        return $this->hasOne(Cart_items::class);
    }

    public function orderItem(){
        return $this->hasOne(Order_item::class);
    }
}
