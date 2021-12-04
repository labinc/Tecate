<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
 protected $table = 'results';

 protected $fillable = [ 'user_id', 'question_id', 'answer_id' ];

 public function answer(){
  return $this->belongsTo(Answer::class);
 }

 public function question(){
  return $this->belongsTo(Question::class);
 }

 public function user(){
  return $this->belongsTo(User::class);
 }
}
