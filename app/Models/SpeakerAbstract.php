<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpeakerAbstract extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_other',
        'full_name',
        'country',
        'institution',
        'email',
        'files',
        'consent',
        'consented_at',
    ];

    protected $casts = [
        'files' => 'array',
        'consent' => 'boolean',
        'consented_at' => 'datetime',
    ];
}
