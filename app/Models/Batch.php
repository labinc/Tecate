<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
 protected $table = 'batches';

 protected $fillable = [ 'user_id', 'questions_answered', 'questions_right' ];

 public function results(){
  return $this->hasMany(Result::class);
 }

 public function user(){
  return $this->belongsTo(User::class);
 }
}
