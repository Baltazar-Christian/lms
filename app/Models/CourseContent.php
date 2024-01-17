<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'type',
        'file_path',
        'duration',
        'url',
        'parent_id',
    ];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with Sub-contents (Child contents)
    public function subContents()
    {
        return $this->hasMany(CourseContent::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(CourseContent::class, 'parent_id');
    }
}
