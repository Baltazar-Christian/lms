<?php

namespace App\Models;

use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_question_id', 'answer', 'is_correct'];

    // Relationship with Quiz Question
    public function quizQuestion()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
