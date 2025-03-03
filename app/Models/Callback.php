<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone',
        'message',
        'available_morning',
        'available_daytime',
        'available_evening',
        'status',
    ];
}
