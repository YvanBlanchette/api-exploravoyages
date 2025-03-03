<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_client');
    }
}
