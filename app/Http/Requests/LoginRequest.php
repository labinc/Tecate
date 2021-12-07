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
    'identification' => ['required', 'numeric', 'digits_between:6,15']
   ];
  }

  public function messages()
  {
   return [
    'identification.digits_between' => 'El número debe ser entre 6 a 15 dígitos.',
    'identification.numeric' => 'Solo se admiten números.',
    'identification.required' => 'Debe ingresar sú número de cédula.'
   ];
  }
}
