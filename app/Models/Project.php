<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'contractor',
        'phase',
        'status',
    ];

    public function visits():HasMany
    {
        return $this->hasMany(Visit::class);
    }


    public function locations():HasMany
    {
        return $this->hasMany(Location::class);
    }
}
