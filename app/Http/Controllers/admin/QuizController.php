<?php

namespace App\Http\Controllers\admin;

use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Http\Controllers\Controller;
use App\Models\QuizQuestion;

class QuizController extends Controller
{

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId); // Add this line to fetch the course
        return view('admin.quizzes.create', compact('course'));
    }

    public function createQuiz($courseContentId)
    {
        $courseContent = CourseContent::findOrFail($courseContentId);
        return view('admin.quizzes.create', compact('courseContent'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|unique:quizzes|max:255',
            // Add other validation rules as needed
        ]);

        $quiz = new Quiz([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $quiz->save();

        return redirect()->route('lms.show-quiz', [$request->course_id, $quiz->id])->with('success', 'Quiz created successfully.');
    }

    public function showQuestionAnswers(Course $course, Quiz $quiz, QuizQuestion $question)
    {
        $answers = $question->answers;

        return view('admin.quizzes.show-question', compact('course', 'quiz', 'question', 'answers'));
    }

    public function show($courseId, $quizId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        $questions=QuizQuestion::where('quiz_id',$quiz->id)->get();
        // dd( $questions);

        return view('admin.quizzes.show', compact('course', 'quiz','questions'));
    }

    public function destroy($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $quiz->delete();

        return back();
    }


    public function createQuestion($courseId, $quizId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        return view('admin.quizzes.create-question', compact('course', 'quiz'));
    }

    public function storeQuestion(Request $request, $courseId, $quizId)
    {
        $course = Course::findOrFail($courseId);


        $quiz = Quiz::findOrFail($quizId);
        // dd($course);
        $request->validate([
            'text' => 'required|max:255',
        ]);

        $quiz = new QuizQuestion([
            'quiz_id' => $quiz->id,
            'question' => $request->input('text'),
        ]);

        $quiz->save();
        return redirect()->route('lms.show-quiz', [$course->id, $quiz->id])->with('success', 'Question added successfully.');
    }


    public function createAnswer($courseId, $quizId, $questionId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        $question = QuizQuestion::findOrFail($questionId);

        return view('admin.quizzes.create-answer', compact('course', 'quiz', 'question'));
    }

    public function storeAnswer(Request $request, $courseId, $quizId, $questionId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        $question = QuizQuestion::findOrFail($questionId);

        $request->validate([
            'answer' => 'required|max:255',
            'is_correct' => 'required|boolean',
        ]);

        $answer = $question->answers()->create($request->all());

        return redirect()->route('lms.show-quiz', [$course->id, $quiz->id])->with('success', 'Answer added successfully.');
    }

    public function showAnswerDetail(Course $course, Quiz $quiz, QuizQuestion $question, QuizAnswer $answer)
{
    // You can retrieve additional details or perform any other logic here

    return view('admin.quizzes.show-answer-detail', compact('course', 'quiz', 'question', 'answer'));
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
