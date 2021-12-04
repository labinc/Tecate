<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 private int $now;

 public function __construct()
 {
  date_default_timezone_set('America/Bogota');
  $this->now = time()-18000;
 }

 public function streaming()
 {
  $questions = $this->getQuestions();

  return view('common.home', compact('questions'));
 }

 public function store_result(Request $request)
 {
  $count = $this->getAnswer($request->answer)->count();

  if($count!=0)
  {
   $answer = $this->getAnswer($request->answer)->firstOrFail();
   $question = $this->getQuestion($answer->question->id)->firstOrFail();

   $result_last = $this->getResult($question->id)->count();

   if($result_last==0)
   {
    $result = new Result;
    $result->user_id = Auth::user()->id;
    $result->question_id = $question->id;
    $result->answer_id = $answer->id;
    $result->created_at = Carbon::now();
    $result->save();

    return 'Respuesta guardada';
   }
   else{
    return 'Pregunta repetida';
   }
  }
  else{
   return 'Pregunta inexistente';
  }
 }

 public function session()
 {
  if(Auth::check()=='true'){
   return Auth::user();
  }
  else{
   return 'No logueado';
  }
 }

 private function getAnswer($id)
 {
  $query = Answer::with('question')
   ->where('id', $id);

  return $query;
 }

 private function getQuestion($id)
 {
  $query = Question::with('answers')
   ->where('id', $id);

  return $query;
 }

 private function getQuestions()
 {
  $query = Question::where('state', 'Activo')->get();

  return $query;
 }

 private function getResult($question)
 {
  $query = Result::where('user_id', Auth::user()->id)
   ->where('question_id', $question);

  return $query;
 }
}
