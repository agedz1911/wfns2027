<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CVTeaching extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_faculty_id',
        'year',
        'event',
        'country',
        'role',
        'topic',
        'sort_order',
    ];

    public function cvFaculty(): BelongsTo
    {
        return $this->belongsTo(CVFaculty::class, 'cv_faculty_id');
    }
}
