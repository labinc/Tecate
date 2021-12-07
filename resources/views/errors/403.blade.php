@extends('layouts.inicio')
@section('content')
 <section class="col-12 col-md-6 col-lg-6">
  <h4 class="text-center">Lo sentimos, acceso denegado.</h4>
  <div class="col-6 col-sm-5 col-md-6 col-lg-5 mx-auto">
   <a class="btn btn-block p-0" href="{{ route('/') }}">
    <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/btn_next.svg') }}">
   </a>
  </div>
 </section>
@endsection
