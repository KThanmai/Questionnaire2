<?php

namespace App\Http\Controllers;
use App\Questionnaire;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
	public function create(Questionnaire $questionnaire){
    	return view('question.create',compact('questionnaire'));
	}	
	public function store(Questionnaire $questionnaire){
		$data = request()->validate([
			'question.question' => 'required',
			'answers.*.answer' => 'required',
		]);
		$question=$questionnaire->questions()->create($data['question']);
		$question->answers()->CreateMany($data['answers']);

		return redirect('/questionnaire/'.$questionnaire->id);
	}
}
