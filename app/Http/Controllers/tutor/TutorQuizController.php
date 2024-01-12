<?php

namespace App\Http\Controllers\tutor;

use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Http\Controllers\Controller;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use Illuminate\Validation\Rule;

class TutorQuizController extends Controller
{

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId); // Add this line to fetch the course
        return view('tutor.quizzes.create', compact('course'));
    }

    public function createQuiz($courseContentId)
    {
        $courseContent = CourseContent::findOrFail($courseContentId);
        return view('tutor.quizzes.create', compact('courseContent'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|max:255',
            // Add other validation rules as needed
        ]);

        $quiz = new Quiz([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $quiz->save();

        return redirect()->route('lms.tutor-show-quiz', [$request->course_id, $quiz->id])->with('success', 'Quiz created successfully.');
    }

    public function showQuestionAnswers(Course $course, Quiz $quiz, QuizQuestion $question)
    {
        $answers = $question->answers;

        return view('tutor.quizzes.show-question', compact('course', 'quiz', 'question', 'answers'));
    }

    public function editQuestion(Course $course, Quiz $quiz, QuizQuestion $question)
    {
        $answers = $question->answers;

        return view('tutor.quizzes.edit-question', compact('course', 'quiz', 'question', 'answers'));
    }


    public function editAnswer(  $id)
    {

        $answer=QuizAnswer::where('id',$id)->first();


        return view('tutor.quizzes.edit-answer', compact( 'answer'));
    }



    public function update(Request $request, Course $course, Quiz $quiz)
    {
        $request->validate([
            // 'title' => [
            //     'required',
            //     Rule::unique('quizzes')->ignore($quiz->id),
            //     'max:255',
            // ],
            // Add other validation rules as needed
        ]);

        $quiz->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            // Add other fields to update as needed
        ]);

        return redirect()->route('lms.tutor-show-quiz', [$quiz->course_id, $quiz->id])->with('success', 'Quiz Updated successfully.');
    }

    public function show($courseId, $quizId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        $questions = QuizQuestion::where('quiz_id', $quiz->id)->get();
        // dd( $questions);

        return view('tutor.quizzes.show', compact('course', 'quiz', 'questions'));
    }

    public function edit($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        $course = Course::findOrFail($quiz->course_id);
        $questions = QuizQuestion::where('quiz_id', $quiz->id)->get();
        // dd( $questions);

        return view('tutor.quizzes.edit', compact('course', 'quiz', 'questions'));
    }

    public function destroy($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $questions=QuizQuestion::where('quiz_id',$quiz->id)->get();
        foreach( $questions as $question)
        {
            $answers=QuizResult::where('quiz_question_id',$question->id)->get();
            foreach( $answers as $answer)
            {
                $answer->delete();
            }

            $question->delete();
        }

        $quiz->delete();

        return back();
    }


    public function createQuestion($courseId, $quizId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        return view('tutor.quizzes.create-question', compact('course', 'quiz'));
    }

    public function storeQuestion(Request $request, $courseId, $quizId)
    {
        $course = Course::findOrFail($courseId);


        $quiz = Quiz::findOrFail($quizId);
        // dd($course);
        $request->validate([
            'text' => 'required|max:255',
        ]);

        $quizQuestion = new QuizQuestion([
            'quiz_id' => $quiz->id,
            'question' => $request->input('text'),
        ]);

        $quizQuestion->save();
        return redirect()->route('lms.tutor-show-quiz', [$course->id, $quiz->id])->with('success', 'Question added successfully.');
    }

    public function updateQuestion(Request $request, $questionId)
    {


        $quizQuestion = QuizQuestion::where('id',$request->question_id)->first();

        $quizQuestion->update([
            'question' => $request->input('question'),
            // Add other fields to update as needed
        ]);

        return redirect()->route('lms.tutor-show-quiz', [$quizQuestion->quiz->course->id, $quizQuestion->quiz->id])->with('success', 'Question updated successfully.');
    }


    public function updateAnswer(Request $request)
    {




        $answer = QuizAnswer::findOrFail($request->answer_id);

        $answer->answer=$request->answer;
        $answer->is_correct= $request->has('is_correct');
        $answer->update();

        $quizQuestion = QuizQuestion::where('id',$answer->quiz_question_id)->first();


        // return back();
        return redirect()->route('lms.tutor-show-quiz', [$quizQuestion->quiz->course->id, $quizQuestion->quiz->id])->with('success', 'Answer updated successfully.');
    }

    public function deleteQuestion( $questionId)
    {


        $quizQuestion = QuizQuestion::findOrFail($questionId);

        // Check for and delete any related records first
        QuizAnswer::where('quiz_question_id', $questionId)->delete();

        $quizQuestion->delete();

        return back()->with('success', 'Question Deleted successfully.');
    }


    public function deleteAnswer( $answerId)
    {


        $quizAnswer = QuizAnswer::findOrFail($answerId);
        $quizAnswer->delete();

        return back()->with('success', 'Answer Deleted successfully.');
    }




    public function createAnswer($courseId, $quizId, $questionId)
    {
        $course = Course::findOrFail($courseId);
        $quiz = Quiz::findOrFail($quizId);
        $question = QuizQuestion::findOrFail($questionId);

        return view('tutor.quizzes.create-answer', compact('course', 'quiz', 'question'));
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

        return redirect()->route('lms.tutor-show-quiz', [$course->id, $quiz->id])->with('success', 'Answer added successfully.');
    }

    public function showAnswerDetail(Course $course, Quiz $quiz, QuizQuestion $question, QuizAnswer $answer)
    {
        // You can retrieve additional details or perform any other logic here

        return view('tutor.quizzes.show-answer-detail', compact('course', 'quiz', 'question', 'answer'));
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

        return redirect()->route('lms.tutor-show-content', [$courseContent->course_id, $courseContent->id])
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

        return redirect()->route('lms.tutor-show-quiz', $quizId)
            ->with('success', 'Quiz question created successfully.');
    }

    public function createQuizAnswer($questionId)
    {
        $question = QuizQuestion::findOrFail($questionId);
        return view('tutor.quiz_answers.create', compact('question'));
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

        return redirect()->route('lms.tutor-show-quiz', $question->quiz->id)
            ->with('success', 'Quiz answer created successfully.');
    }
}
