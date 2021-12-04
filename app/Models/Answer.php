<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
 protected $table = 'answers';

 protected $fillable = [ 'statement', 'question_id', 'veracity' ];

 public function question(){
  return $this->belongsTo(Question::class);
 }

 public function results(){
  return $this->hasMany(Result::class);
 }
}
