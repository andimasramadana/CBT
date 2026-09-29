<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'nis',
        'instagram_url',
        'whatsapp_url',
        'linkedin_url',
        'photo',
        'rombel',
        'rayon',
        'kelas',
        'skills',
        'interests',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
