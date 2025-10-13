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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function firstImage()
    {
        return $this->images()->first();
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function cartItem()
    {
        return $this->hasOne(Cart_items::class);
    }

    public function orderItem()
    {
        return $this->hasOne(Order_item::class);
    }
}
