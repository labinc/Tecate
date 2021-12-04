<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
 public function authorize()
 {
  return true;
 }

 public function rules()
 {
  return [
   'habeas' => ['required', 'accepted'],
   'identification' => ['required', 'numeric', 'digits_between:6,15', 'unique:users,identification'],
   'name' => ['required', 'string', 'max:100']
  ];
 }

 public function messages()
 {
  return [
   'habeas.accepted' => 'Debe aceptar terminos y condiciones.',
   'habeas.required' => 'Debe aceptar terminos y condiciones.',
   'identification.digits_between' => 'El número debe ser entre 6 a 15 dígitos.',
   'identification.numeric' => 'Solo se admiten números.',
   'identification.unique' => 'Este número ya se encuentra registrado.',
   'identification.required' => 'Debe ingresar sú número de cédula.',
   'name.max' => 'Máximo 100 caracteres.',
   'name.required' => 'Debe ingresar su nombre completo.',
   'name.string' => 'El nombre ingresado contiene números.'
  ];
 }
}
