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
        'qualifications',
        'specializations',
        'experience_years_per_qualification',
        'extra_requirements',
        'start_date',
        'end_date',
        'salary',
        'number_of_positions',
        'location',
        'type',
        'category',
        'creator_user_id',
        'last_modifier_user_id'
    ];

    /**
     * function to get the creator of the job
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    /**
     * function to get the last modifier of the job
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 
     */
    public function lastModifier()
    {
        return $this->belongsTo(User::class, 'last_modifier_user_id');
    }

}