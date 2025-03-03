<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'booking_id',
        'dossier_id',
        'agent_id',
        'transaction_type',
        'paiement_method',
        'amount',
        'paid_amount',
        'balance_amount',
        'confirmation_number',
        'status',
        'currency',
        'details',
    ];
}
