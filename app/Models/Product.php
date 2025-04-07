<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'serial_number',
        'description',
        'image',
        'request_number',
        'price',
        'active'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة المنتج بتفاصيل الطلبات (اختيارية)
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
