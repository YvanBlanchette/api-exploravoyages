<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupClient extends Model
{
    protected $table = 'group_client';

    protected $fillable = [
        'group_id',
        'client_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}