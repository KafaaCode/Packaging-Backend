<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
        'country_id',
        'specialization_id',
        'active'
    ];

    // علاقة الفئة بالدولة
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // علاقة الفئة بالتخصص
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
