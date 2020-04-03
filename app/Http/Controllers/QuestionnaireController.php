<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        return view('questionnaire.create');
    }
    public function store(Questionnaire $questionnaire){
        $data = \request()->validate([
           'title' => 'required',
            'purpose' => 'required'
        ]);
//        $data['user_id'] = auth()->user()->id;
//        $questionnaire = \App\Questionnaire::create($data);

        $questionnaire = auth()->user()->questionnaires()->create($data);
        return redirect('/questionnaires/'.$questionnaire->id);
    }
    public function show(Questionnaire $questionnaire){

        $questionnaire->load('questions.answers.responses');
        return view('/questionnaire.show', compact('questionnaire'));
    }
    public function destroy(Questionnaire $questionnaire, Question $question){

        $question->answers()->delete();
        $question->delete();
        return redirect($questionnaire->path());
    }
}
