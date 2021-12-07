@extends('layouts.inicio')
@section('content')
 <section class="col-11 col-sm-10 col-md-6 col-lg-5 z-2">
  <img class="img-fluid animated fadeInDown w-100" src="{{ asset('/img/elements/svg/instructions.svg') }}">
  <img class="img-fluid animated fadeInUp my-4 w-100" src="{{ asset('/img/elements/svg/text_1.svg') }}">
  <div class="col-6 col-sm-5 col-md-6 col-lg-5 animated mx-auto pulse">
   <a class="btn btn-block p-0" href="{{ route('question') }}">
    <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/btn_start.svg') }}">
   </a>
  </div>
 </section>
@endsection
