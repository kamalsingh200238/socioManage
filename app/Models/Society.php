<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Society extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'president_id',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function president(): BelongsTo
    {
        return $this->belongsTo(User::class, 'president_id');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'society_user')->withTimestamps();
    }
}
