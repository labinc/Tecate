@extends('layouts.inicio')
@section('content')
 <article class="col-12 col-sm-10 col-md-6 animated fadeInLeft d-none d-sm-block z-2">
  <div class="col-12 col-md-9 mx-auto p-0">
   <img class="img-fluid w-100" src="{{ asset('/img/elements/png/can_2.png') }}">
  </div>
 </article>
 <article class="col-12 col-md-6 animated fadeInRight z-2">
  <div class="col-10 col-sm-8 col-md-7 mx-auto p-0">
   <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/title_1.svg') }}">
  </div>
  <form class="col-12 mx-auto my-5 my-md-4 row" id="formLogin" method="post" action="{{ route('login') }}">
   @csrf
   <div class="col-12 col-md-6 p-0">
    <div class="col-11 mx-auto my-1 px-0">
     <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" title="Ingrese sus nombres y apellidos(Solo se permiten caracteres alfabéticos)" placeholder="NOMBRE*" maxlength="100" id="name" name="name" value="{{ old('name') }}" required>
     {!! $errors->first('name', '<p class="form-error font-size-1">:message</p>') !!}
    </div>
    <div class="col-11 mx-auto my-1 px-0">
     <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" title="Ingrese su correo electrónico" placeholder="CORREO ELECTRÓNICO*" maxlength="100" id="email" name="email" value="{{ old('email') }}" required>
     {!! $errors->first('email', '<p class="form-error font-size-1">:message</p>') !!}
    </div>
    <div class="col-11 mx-auto my-1 px-0">
     <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" title="Elija su género*" name="gender" id="gender" required>
      <option disabled selected value="">GÉNERO</option>
      <option value='Masculino' @if(old('gender')==='Masculino') selected @endif>Masculino</option>
      <option value='Femenino' @if(old('gender')==='Femenino') selected @endif>Femenino</option>
     </select>
     {!! $errors->first('gender', '<p class="form-error font-size-1">:message</p>') !!}
    </div>
    <div class="col-11 mx-auto my-1 px-0">
     <input class="form-control {{ $errors->has('units') ? 'is-invalid' : '' }}" type="text" title="Ingrese las unidades de compra" placeholder="UNIDADES DE COMPRA*" maxlength="500" id="units" name="units" value="{{ old('units') }}">
     {!! $errors->first('units', '<p class="form-error font-size-1">:message</p>') !!}
    </div>
   </div>
   <div class="col-12 col-md-6 p-0">
    <div class="col-11 mx-auto my-1 px-0">
     <input class="form-control {{ $errors->has('identification') ? 'is-invalid' : '' }}" type="number" title="Ingrese su documento de identidad (solo se permiten números enteros)" placeholder="DOCUMENTO DE IDENTIDAD*" minlength="6" maxlength="15" pattern="[0-9]+" id="identification" name="identification" value="{{ old('identification') }}" required>
     {!! $errors->first('identification', '<p class="form-error font-size-1">:message</p>') !!}
    </div>
    <div class="col-11 mx-auto my-1 px-0" id="date_birthday">
     <div class="input-group" data-td-target-input="nearest" data-td-target-toggle="nearest">
      <input class="form-control readonly small {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text" data-td-target="#date_birthday" title="Ingrese su fecha de nacimiento" placeholder="FECHA DE NACIMIENTO*" id="birthday" name="birthday" required>
      <span class="input-group-text" data-td-target="#date_birthday" data-td-toggle="datetimepicker">
       <i class="fa fa-calendar"></i>
      </span>
     </div>
     {!! $errors->first('birthday', '<p class="form-error font-size-1">:message</p>') !!}
    </div>
    <div class="col-11 mx-auto my-1 px-0">
     <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="number" title="Ingrese su número de teléfono (solo se permiten números enteros)" placeholder="TELÉFONO" minlength="5" maxlength="20" pattern="[0-9]+" id="phone" name="phone" value="{{ old('phone') }}">
     {!! $errors->first('phone', '<p class="form-error font-size-1">:message</p>') !!}
    </div>
   </div>
   <div class="col-11 mx-auto my-1 px-0 text-center text-md-left">
    <input type="checkbox" id="habeas" name="habeas" required>
    <label class="small" for="habeas">Acepto <a class="text-dark" target="_blank" href="{{ asset('/doc/terminos.pdf') }}"><u>términos y condiciones</u></a></label>
    {!! $errors->first('habeas', '<p class="form-error font-size-1">:message</p>') !!}
   </div>
   <div class="col-8 col-sm-6 col-md-4 mx-auto mt-2">
    <button class="btn btn-block p-0" type="submit">
     <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/btn_register.svg') }}">
    </button>
   </div>
   <div class="col-12">
    <div class="col-8 col-sm-6 col-md-4 mx-auto">
     <a class="btn btn-block p-0" href="{{ route('login') }}"><u class="font-size-1">Ya tengo una cuenta</u></a>
    </div>
   </div>
  </form>
 </article>
@endsection
