<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\QuizResult;
use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title','description'];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function results()
{
    return $this->hasMany(QuizResult::class);
}

    // Relationship with Quiz Questions
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }


    public function hasUserAttempted(User $user)
    {
        return $this->results()->where('user_id', $user->id)->exists();
    }

    public function getUserResultId(User $user)
    {
        return $this->results()->where('user_id', $user->id)->value('id');
    }
}
