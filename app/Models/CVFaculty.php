<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CVFaculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'nik',
        'nip',
        'profession',
        'institution',
        'city',
        'country',
        'sex',
        'birth_place',
        'birth_date',
        'highest_education',
        'phone',
        'email',
        'bio',
        'photo_path',
        'consent',
        'consented_at',
    ];

    public function cvTeachings(): HasMany
    {
        return $this->hasMany(CVTeaching::class, 'cv_faculty_id')->orderBy('sort_order');
    }

    public function cvWorks(): HasMany
    {
        return $this->hasMany(CVWork::class, 'cv_faculty_id')->orderBy('sort_order');
    }
}
