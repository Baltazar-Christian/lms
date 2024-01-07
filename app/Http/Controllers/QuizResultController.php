<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\QuizAnswer;
use App\Models\QuizResult;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{

    public function show($courseId, $quizId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        $questions=QuizQuestion::where('quiz_id',$quiz->id)->get();
        // dd( $questions);

        return view('student.show_quiz', compact('course', 'quiz','questions'));
    }

    // app/Http/Controllers/QuizResultController.php
public function store(Request $request, Quiz $quiz)
{
    $request->validate([
        'answers.*' => 'required|exists:question_options,id',
    ]);

    $user = auth()->user();

    // Check if the user has already taken the quiz
    $existingResult = QuizResult::where('user_id', $user->id)->where('quiz_id', $quiz->id)->first();

    if ($existingResult) {
        return redirect()->back()->with('error', 'You have already taken this quiz.');
    }

    // Calculate the total score based on correct answers
    $totalScore = 0;

    foreach ($request->input('answers') as $questionId => $selectedOptionId) {
        $option = QuizAnswer::find($selectedOptionId);

        if ($option && $option->is_correct) {
            $totalScore++;
        }
    }

    // Save the quiz result
    QuizResult::create([
        'user_id' => $user->id,
        'quiz_id' => $quiz->id,
        'score' => $totalScore,
    ]);

    return redirect()->route('quizzes.show', $quiz->id)->with('success', 'Quiz result recorded.');
}

}
