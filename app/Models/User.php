<?php

namespace App\Models;

use App\Notifications\MyResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
 use Notifiable;

 protected $fillable = [ 'name', 'identification', 'birthday', 'gender', 'phone', 'email', 'units', 'password', 'rol_id' ];

 protected $hidden = [ 'password', 'remember_token' ];

 protected $casts = [ 'email_verified_at' => 'datetime' ];

 public function batches(){
  return $this->hasMany(Batch::class);
 }

 public function rol(){
  return $this->belongsTo(Rol::class);
 }

 public function scopeFilter($query, $request)
 {
  if($request->identification){
   $this->getIdentification($query, $request->identification);
  }
  else if($request->name){
   $this->getName($query, $request->name);
  }
  else if($request->search){
   $this->getSearch($query, $request->search);
  }
 }

 private function getIdentification($query, $identification){
  return $query->where('identification', $identification);
 }

 private function getName($query, $name){
  return $query->where('name', $name);
 }

 private function getSearch($query, $search)
 {
  return $query->Where('identification', 'LIKE', "%{$search}%")
   ->orWhere('name', 'LIKE', "%{$search}%");
 }

 public function sendPasswordResetNotification($token){
  $this->notify(new MyResetPassword($token));
 }
}
