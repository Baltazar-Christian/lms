<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function createQuiz($courseContentId)
    {
        $courseContent = CourseContent::findOrFail($courseContentId);
        return view('admin.quizzes.create', compact('courseContent'));
    }

    public function storeQuiz(Request $request, $courseContentId)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $courseContent = CourseContent::findOrFail($courseContentId);

        $quiz = new Quiz([
            'course_content_id' => $courseContent->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $quiz->save();

        return redirect()->route('lms.show-content', [$courseContent->course_id, $courseContent->id])
            ->with('success', 'Quiz created successfully.');
    }


    public function createQuizQuestion($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('quiz_questions.create', compact('quiz'));
    }

    public function storeQuizQuestion(Request $request, $quizId)
    {
        $request->validate([
            'question' => 'required',
        ]);

        $quiz = Quiz::findOrFail($quizId);

        $question = new QuizQuestion([
            'quiz_id' => $quiz->id,
            'question' => $request->input('question'),
        ]);

        $question->save();

        return redirect()->route('lms.show-quiz', $quizId)
            ->with('success', 'Quiz question created successfully.');
    }

    public function createQuizAnswer($questionId)
    {
        $question = QuizQuestion::findOrFail($questionId);
        return view('quiz_answers.create', compact('question'));
    }

    public function storeQuizAnswer(Request $request, $questionId)
    {
        $request->validate([
            'answer' => 'required',
            'is_correct' => 'boolean',
        ]);

        $question = QuizQuestion::findOrFail($questionId);

        $answer = new QuizAnswer([
            'quiz_question_id' => $question->id,
            'answer' => $request->input('answer'),
            'is_correct' => $request->has('is_correct'),
        ]);

        $answer->save();

        return redirect()->route('lms.show-quiz', $question->quiz->id)
            ->with('success', 'Quiz answer created successfully.');
    }

}
