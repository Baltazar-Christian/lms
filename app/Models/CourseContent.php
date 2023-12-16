<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseContent extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title', 'description', 'file_path'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
