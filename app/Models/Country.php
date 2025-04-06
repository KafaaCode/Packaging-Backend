<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    // علاقة الدولة بالمستخدمين
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // علاقة الدولة بالفئات
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
