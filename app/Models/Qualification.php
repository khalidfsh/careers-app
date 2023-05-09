<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'title',
        'degree',
        'institution',
        'field_of_study',
        'start_date',
        'end_date',
        'grade',
        'document_path'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}