<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name',
        'category',
        'agent_id',
        'description',
        'phone_number',
        'website',
    ];
}
