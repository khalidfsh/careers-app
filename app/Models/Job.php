<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'number_of_positions',
        'qualification',
        'required_specializations',
        'required_experience_years',
        'requirements',
        'user_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}