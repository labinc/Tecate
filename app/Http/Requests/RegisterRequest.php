<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
   'birthday' => ['nullable', 'string'],
   'email' => ['required', 'email', 'max:100', 'unique:users,email'],
   'gender' => ['required', Rule::in(['Masculino', 'Femenino']) ],
   'habeas' => ['required', 'accepted'],
   'identification' => ['required', 'numeric', 'digits_between:6,15', 'unique:users,identification'],
   'name' => ['required', 'string', 'max:100'],
   'phone' => ['nullable', 'digits_between:5,20', 'numeric'],
   'units' => ['required', 'max:500']
  ];
 }

 public function messages()
 {
  return [
   'birthday.string' => 'La fecha ingresada no es válida.',
   'email.email' => 'Debe ingresar un correo electrónico válido.',
   'email.max' => 'Máximo 100 caracteres.',
   'email.required' => 'Debe ingresar un correo electrónico.',
   'email.unique' => 'Este correo ya se encuentra registrado.',
   'gender.in' => 'La opción ingresada no es válida.',
   'gender.required' => 'Debe elegir el género.',
   'habeas.accepted' => 'Debe aceptar terminos y condiciones.',
   'habeas.required' => 'Debe aceptar terminos y condiciones.',
   'identification.digits_between' => 'El número debe ser entre 6 a 15 dígitos.',
   'identification.numeric' => 'Solo se admiten números.',
   'identification.required' => 'Debe ingresar sú número de cédula.',
   'identification.unique' => 'Este número ya se encuentra registrado.',
   'name.max' => 'Máximo 100 caracteres.',
   'name.required' => 'Debe ingresar su nombre completo.',
   'name.string' => 'El nombre ingresado contiene números.',
   'phone.numeric' => 'El número ingresado contiene letras y/o carácteres especiales, solo se aceptan números enteros.',
   'phone.digits_between' => 'El número debe ser entre 5 a 20 dígitos.',
   'units.max' => 'Máximo 500 caracteres.',
   'units.required' => 'Debe ingresar las unidades de compra.'
  ];
 }
}
