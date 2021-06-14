<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function questionView()
    {
        $notanswerdQuestions = Question::where('answer_status',1)->latest()->paginate(10);
        return view('question/view',compact('notanswerdQuestions'));
    }

    function answeredQuestionView()
    {
        $answerdQuestions = Question::where('answer_status',2)->latest()->paginate(10);
        return view('question/answeredQuestion',compact('answerdQuestions'));
    }

    function answerQuestionView($questionId)
    {
        $question = Question::findOrFail($questionId);
        return view('question/answerView', compact('question'));
    }

    function questionAnswerInsert(Request $request)
    {
        $request->validate([
            'answer' => 'required',
        ]);

        Question::find($request->questionId)->update([
            'answer' => $request->answer,
            'answer_status' => 2,
            'updated_at' => Carbon::now(),
        ]);
        return redirect('question/view')->with('status', 'Answer Submitted Successfully!');
    }

    function deleteQuestion($questionId)
    {
        Question::findOrFail($questionId)->delete();
        return back()->with('status', 'Question Deleted Successfully!');
    }
}
