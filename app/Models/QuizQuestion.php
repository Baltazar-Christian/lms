<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'question'];

    // Relationship with Quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Relationship with Quiz Answers
    public function answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }
}
