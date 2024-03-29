<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'full_name',
        'phone_code',
        'phone',
        'nationality',
        'national_id',
        'is_saudi',
        'is_single',
        'is_male',
        'birth_date',
        'address',
        'skills',
        'languages',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class, 'resume_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'resume_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'resume_id');
    }
}