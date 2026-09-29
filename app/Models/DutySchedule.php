<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DutySchedule extends Model
{
    protected $fillable = [
        'day',
        'students',
        'order',
    ];

    protected $casts = [
        'students' => 'array',
    ];
}
