<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
 protected $table = 'questions';

 protected $fillable = [ 'statement', 'state' ];

 public function answer_fine(){
  return $this->hasOne(Answer::class)->where('veracity', 'Si');
 }

 public function answers(){
  return $this->hasMany(Answer::class);
 }

 public function results(){
  return $this->hasMany(Result::class);
 }
}
