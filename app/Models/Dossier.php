<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dossier extends Model
{
    protected $fillable = [
        'name',
        'client_id',
        'agent_id',
        'status',
        'details',
        'total_amount',
        'balance_amount',
        'balance_due_date',
        'payment_complete',
        'currency',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
