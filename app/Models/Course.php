<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'description',
        'slug',
        'price',
        'duration_in_minutes',
        'is_published',
        'published_at',
        'cover_image'
    ];
}
