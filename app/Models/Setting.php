<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'whatsup_link',
        'facebook_link',
        'telegram_link',
        'sender_email'
    ];
}
