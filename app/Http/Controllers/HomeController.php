<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Batch;
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

 /** Retorna la vista con las instrucciones */
 public function home()
 {
  return view('common.home');
 }

 /** Retorna la vista con la información de la tanda resuelta */
 public function resume()
 {
  if(session()->has('resume'))
  {
   $result = session()->get('resume');
   session()->forget('resume');

   return view('common.resume', compact('result'));
  }else{
   return redirect()->route('question');
  }
  return view('common.resume');
 }

 /** Retorna la vista donde se contestan las preguntas */
 public function question()
 {
  /** Primer filtro: el usuario termina una tanda de preguntas */
  if(session()->has('resume')){
   return redirect()->route('resume');
  }
  /** Primer filtro: el usuario inicia una tanda de preguntas */
  else{
   $questions = $this->getQuestions();

   /** Segundo filtro: hay preguntas disponibles */
   if($questions->count()>0){
    $batches = $this->getBatches();

    /** Tercer filtro: existen tandas del usuario logueado */
    if($batches->count()>0){
     $batch = $this->getBatchLast()->firstOrFail();

     /** Cuarto filtro: la última tanda del usuario logueado está completa */
     if($batch->questions_answered===$questions->count()){
      $batch = $this->store_batch(); //Crea una tanda
      $question = $this->getQuestionRandom(); //Pregunta al azar

      return view('common.question', compact(['batch', 'question']));
     }
     /** Cuarto filtro: la última tanda del usuario logueado está incompleta */
     else{
      /** Quinto filtro: si hay por lo menos una pregunta respondida de la última tanda */
      if($this->getBatch($batch->id)->questions_answered>0){
       $question = $this->getQuestionRandomBatch($batch->id); //Pregunta al azar no contestada
      }
      /** Quinto filtro: si no hay preguntas respondidas de la última tanda */
      else{
       $question = $this->getQuestionRandom($batch->id); //Pregunta al azar
      }

      return view('common.question', compact(['batch', 'question']));
     }
    }
    /** Tercer filtro: no existen tandas del usuario logueado */
    else{
     $batch = $this->store_batch(); //Crea una tanda
     $question = $this->getQuestionRandom(); //Pregunta al azar

     return view('common.question', compact(['batch', 'question']));
    }
   }
   /** Segundo filtro: no hay preguntas disponibles */
   else{
    session()->flash('warning', 'No hay preguntas disponibles en el momento.');

    return redirect()->route('home');
   }
  }
 }

 /** Guarda los resultados(respuestas escogidas por el usuario)
  * retornando la respuesta verdadera en caso de fallar
  */
 public function store_answer(Request $request)
 {
  $answer = $this->getAnswer($request->answer);
  $score = ($answer->veracity=='Si') ? 1 : 0;
  $question = $this->getQuestion($answer->question_id);

  $result = new Result;
  $result->batch_id = $request->batch;
  $result->question_id = $question->id;
  $result->answer_id = $answer->id;
  $result->score = $score;
  $result->created_at = Carbon::now();
  $result->save();

  $this->update_batch($result->batch_id, $score);

  if($score===1){
   session()->flash('success', 'Se ha enviado su respuesta.');
  }else{
   session()->flash('error', "Incorrecto, la respuesta a la pregunta es: ".$question->answer_fine->statement);
  }

  return redirect()->route('question');
 }

 /** Comprueba si hay una sesión iniciada o no */
 public function session()
 {
  if(Auth::check()=='true'){
   return Auth::user();
  }else{
   return 'No logueado';
  }
 }

 /** Crea una nueva tanda para el usuario logueado */
 private function store_batch()
 {
  $batch = new Batch;
  $batch->user_id = Auth::user()->id;
  $batch->questions_answered = 0;
  $batch->questions_right = 0;
  $batch->created_at = Carbon::now();
  $batch->save();

  return $batch;
 }

 /** Actualiza el total del preguntas respondidas y el total de preguntas acertadas de una tanda */
 private function update_batch($id, $score)
 {
  $batch = $this->getBatch($id);
  $batch->questions_answered += 1;
  $batch->questions_right += $score;
  $batch->updated_at = Carbon::now();
  $batch->save();

  if($batch->questions_answered===4){
   session()->put('resume', $batch->questions_right);
  }
 }

 /** Retorna una respuesta por el id */
 public function getAnswer($id)
 {
  $query = Answer::with(['question', 'results'])
   ->findOrFail($id);

  return $query;
 }

 /** Retorna una tanda por el id */
 public function getBatch($id)
 {
  $query = Batch::findOrFail($id);

  return $query;
 }

 /** Retorna la última tanda del usuario logueado */
 private function getBatchLast()
 {
  $query = Batch::with(['results', 'user'])
   ->where('user_id', Auth::user()->id)
   ->latest('id');

  return $query;
 }

 /** Retorna todas las tandas disponibles del usuario logueado */
 private function getBatches()
 {
  $query = Batch::with(['results', 'user'])
   ->where('user_id', Auth::user()->id);

  return $query;
 }

 /** Retorna una pregunta por el id */
 public function getQuestion($id)
 {
  $query = Question::with(['answers', 'results'])
   ->findOrFail($id);

  return $query;
 }

 /** Retorna una pregunta al azar */
 private function getQuestionRandom()
 {
  $query = Question::with(['answers', 'results'])
   ->inRandomOrder()
   ->first();

  return $query;
 }

 /** Retorna una pregunta al azar no respondida de la última ronda del usuario logueado */
 private function getQuestionRandomBatch($batch)
 {
  $query = Question::with(['answers', 'results'])
   ->whereNotIn('id', $this->getResultsByBatch($batch))
   ->inRandomOrder()
   ->first();

  return $query;
 }

 /** Retorna todas las preguntas disponibles */
 private function getQuestions()
 {
  $query = Question::with(['answers', 'results'])
   ->where('state', 'Activo');

  return $query;
 }

 /** Retorna todos los ids de las preguntas de un resultado */
 private function getResultsByBatch($batch)
 {
  $results = Result::select('question_id')
   ->where('batch_id', $batch)
   ->get();

  $array = $results->toArray();
  $query = array_column($array, 'question_id');

  return $query;
 }
}
