@extends('layouts.inicio')
@section('content')
 <article class="col-10 col-md-5 animated fadeInLeft z-2">
  <div class="col-12 col-sm-11 col-md-9 mx-auto mx-md-0 ml-md-auto p-0">
   <img class="img-fluid w-100" src="{{ asset('/img/elements/png/can_2.png') }}">
  </div>
 </article>
 <article class="col-11 col-sm-10 col-md-5 animated container-trivia fadeInRight justify-content-around z-2">
  <div class="col-9 p-0">
   @if($result===4)
    <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/congratulations.svg') }}">
   @else
    <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/loser.svg') }}">
   @endif
  </div>
  <div class="col-9 my-2 p-0 row">
   <div class="col-7 px-1">
    @if($result===4)
     <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/text_winner.svg') }}">
    @else
     <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/text_loser.svg') }}">
    @endif
   </div>
   <div class="col-5 px-1">
    <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/ico_logo.svg') }}">
   </div>
  </div>
  <div class="col-9 container-trivia justify-content-between my-2">
   <a class="col-5 btn px-1" href="{{ route('question') }}">
    <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/btn_again.svg') }}">
   </a>
   <form class="col-5 btn px-1" method="post" action="{{ route('close') }}">
    @csrf
    {!! method_field('PUT') !!}
    <button class="btn btn-block p-0">
     <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/btn_end.svg') }}">
    </button>
   </form>
  </div>
 </article>
@endsection
