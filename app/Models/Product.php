<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'summary',
        'description',
        'discount',
        'discount_amount',
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
        return $this->hasOne(Image::class)->orderBy('id');
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
