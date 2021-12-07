<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
 private int $now;

 public function __construct()
 {
  date_default_timezone_set('America/Bogota');
  $this->now = time()-18000;
 }

 public function showLoginForm(){
  return view('auth.login');
 }

 public function login(LoginRequest $request)
 {
  if(Auth::attempt(['identification' => $request->identification, 'password' => "secret"]))
  {
   $user = $this->getUser($request->identification);

   Auth::login($user);

   session()->flash('success', 'Ha ingresado exitosamente.');

   return redirect()->route('home');
  }
  else
  {
   session()->flash('error', 'Esta cédula no está registrada en el sistema.');

   return back()
    ->withErrors(['identification' => trans('auth.failed')])
    ->withInput([request('identification')]);
  }
 }

 public function showRegisterForm(){
  return view('auth.register');
 }

 public function register(RegisterRequest $request)
 {
  try
  {
   $user = new User;
   $user->name = $request->name;
   $user->identification = $request->identification;
   $user->birthday = strtotime($request->birthday);
   $user->gender = $request->gender;
   $user->phone = $request->phone;
   $user->email = $request->email;
   $user->units = $request->units;
   $user->password = Hash::make("secret");
   $user->rol_id = 2;
   $user->created_at = Carbon::now();
   $user->save();

   Auth::login($user);

   session()->flash('success', 'Se ha registrado exitosamente.');

   return redirect()->route('home');
  }
  catch(Exception $e)
  {
   session()->flash('error', 'Ha ocurrido un error, no ha podido completarse su registro.');

   return redirect()->route('register');
  }
 }

 public function close()
 {
  Auth::logout();

  return redirect()->route('/');
 }

 public function logout(){
  Auth::logout();
 }

 private function getUser($identification)
 {
  $query = User::where('identification', $identification)
   ->where('rol_id', 2)
   ->firstOrFail();

  return $query;
 }
}
