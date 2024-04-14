<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'latitude',
        'longitude',
        'type',
        'status',
        'neighborhood',
    ];

    public function broker():BelongsTo
    {
        return $this->belongsTo(Broker::class);
    }

    public function visits():HasMany
    {
        return $this->hasMany(Visit::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}
