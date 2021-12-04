<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  public function authorize()
  {
   return true;
  }

  public function rules()
  {
   return [
    'identification' => ['required', 'max:30', 'min:6', 'regex:/^[\w-]*$/']
   ];
  }

  public function messages()
  {
   return [
    'identification.max' => 'Máximo 30 caracteres.',
    'identification.min' => 'Mínimo 6 caracteres.',
    'identification.regex' => 'El número de cédula ingresado contiene carácteres especiales, solo se aceptan caracteres alfanúmericos.',
    'identification.required' => 'Debe ingresar su número de cédula.'
   ];
  }
}
