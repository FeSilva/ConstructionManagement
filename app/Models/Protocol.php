<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type_id',
        'owner_id',
        'competention_month',
        'status'
    ];
}
