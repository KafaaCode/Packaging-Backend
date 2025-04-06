<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'name'
    ];

    // علاقة التخصص بالمستخدمين
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // علاقة التخصص بالفئات
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
