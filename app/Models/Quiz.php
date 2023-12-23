<?php

namespace App\Models;

use App\Models\Course;
use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title'];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with Quiz Questions
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
