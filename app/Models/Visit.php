<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'client_id',
        'broker_id',
        'purpose',
        'impression',
        'next_action',
        'client_location_id',
        'project_location_id',
    ];

    public function project():BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function broker():BelongsTo
    {
        return $this->belongsTo(Broker::class);
    }

    public function projectLocation():BelongsTo
    {
        return $this->belongsTo(Location::class,'project_location_id');
    }

    public function clientLocation():BelongsTo
    {
        return $this->belongsTo(Location::class,'client_location_id');
    }
}
