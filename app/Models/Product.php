<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'serial_number',
        'description',
        'image',
        'request_number',
        'price',
        'active'
    ];

    // علاقة المنتج بتفاصيل الطلبات (اختيارية)
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
