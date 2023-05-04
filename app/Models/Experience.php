<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'description',
        'start_date',
        'end_date',
        'is_current',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
