<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
