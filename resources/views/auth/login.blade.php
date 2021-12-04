@extends('layouts.inicio')
@section('content')
 <article class="col-12 col-sm-10 col-md-6 animated fadeInLeft d-none d-sm-block z-2">
  <div class="col-12 col-md-9 mx-auto p-0">
   <img class="img-fluid w-100" src="{{ asset('/img/elements/png/can_2.png') }}">
  </div>
 </article>
 <article class="col-12 col-md-6 animated fadeInRight z-2">
  <div class="col-10 col-sm-8 col-md-7 mx-auto p-0">
   <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/title_2.svg') }}">
  </div>
  <form class="mx-auto my-5 my-md-4" id="formLogin" method="post" action="{{ route('login') }}">
   @csrf
   <div class="col-10 col-sm-8 col-md-7 mx-auto my-1 px-0">
    <input class="form-control {{ $errors->has('identification') ? 'is-invalid' : '' }}" type="text" title="Ingrese con tú documento de identidad (solo se permiten números enteros)" placeholder="DOCUMENTO DE IDENTIDAD" pattern="[0-9]+" minlength="6" maxlength="15" id="identification" name="identification" value="{{ old('identification') }}" required>
    {!! $errors->first('identification', '<p class="form-error font-size-1">:message</p>') !!}
   </div>
   <div class="col-8 col-sm-6 col-md-4 mx-auto mt-2">
    <button class="btn btn-block p-0" type="submit">
     <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/btn_login.svg') }}">
    </button>
   </div>
   <div class="col-12">
    <div class="col-8 col-sm-6 col-md-4 mx-auto">
     <a class="btn btn-block p-0" href="{{ route('register') }}"><u class="font-size-1">No tengo una cuenta</u></a>
    </div>
   </div>
  </form>
 </article>
@endsection
