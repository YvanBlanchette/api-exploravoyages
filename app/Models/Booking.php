<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'status',
        'client_id',
        'group_id',
        'agent_id',
        'provider_id',
        'booking_platform',
        'booking_number',
        'departure_date',
        'return_date',
        'origin',
        'destination',
        'details',
        'amount',
        'deposit_amount',
        'balance_amount',
        'balance_due_date',
        'receipt_number',
        'currency',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
