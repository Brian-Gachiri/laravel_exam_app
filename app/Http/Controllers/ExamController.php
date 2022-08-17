<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //

    public function index(Request $request){
        $exams = Exam::all();
        return view('welcome', compact('exams'));
    }

    public function details($id){
        $exam = Exam::findOrFail($id);

        $questions = Question::where('exam_id', $exam->id)->get();
        $categories = Category::all();

        return view('questions', compact('exam', 'questions', 'categories'));
    }


    public function create(Request $request){

        $question = $request->question;
        $category_id = $request->category_id;
        $exam_id = $request->exam;
        $choice_1 = $request->choice_1;
        $choice_2 = $request->choice_2;
        $choice_3 = $request->choice_3;
        $choice_4 = $request->choice_4;

        Question::create([
            'choice_1'=>$choice_1,
            'choice_2'=>$choice_2,
            'choice_3'=>$choice_3,
            'choice_4'=>$choice_4,
            'question'=>$question,
            'category_id'=>Category::find($category_id)->id,
            'exam_id'=>Exam::find($exam_id)->id
        ]);


        return response()->json();
    }

    public function delete($id){

        $question = Question::find($id);
        $question->delete();

        return response()->json();
    }
}
