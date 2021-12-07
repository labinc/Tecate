@extends('layouts.inicio')
@section('content')
 <section class="col-11 col-sm-10 z-2">
  <div class="col-11 col-sm-10 col-md-5 col-lg-4 col-xl-3 animated fadeInDown mx-auto mx-md-0 ml-md-5 my-5 my-md-4">
   <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/question.svg') }}">
  </div>
  <div class="col-12 container-trivia">
   <div class="col-md-4 d-none d-md-flex">
    <div class="col-9 col-lg-8 col-xl-7 mx-auto">
     <img class="img-fluid w-100" src="{{ asset('/img/elements/png/can_1.png') }}">
    </div>
   </div>
   <div class="col-12 col-md-7 mx-auto">
    <div class="col-12 animated fadeInUp mb-4 mb-md-3 mx-auto">
     <h4 class="font-weight-bold text-center text-md-justify">{{ $question->statement }}</h4>
    </div>
    <form class="col-10 col-sm-9 col-md-8 col-lg-9 animated mx-auto pulse" method="post" id="formQuestion" action="{{ route('store.answer') }}">
     @csrf
     <input type="hidden" name="batch" value="{{ $batch->id }}">
     @forelse($question->answers as $index => $answer)
      @if($index%2!=0)
       <button class="btn btn-outline-danger btn-block animated fadeInRight p-0 btn-answer" name="answer" value="{{ $answer->id }}" type="submit">
      @else
       <button class="btn btn-outline-danger btn-block animated fadeInLeft p-0 btn-answer" name="answer" value="{{ $answer->id }}" type="submit">
      @endif
       <h4 class="m-0">{{ $index+1 }}) {{ $answer->statement }}</h4>
      </button>
     @empty
      <h4 class="m-0">Esta pregunta no tiene respuestas</h4>
     @endforelse
    </form>
   </div>
  </div>
 </section>
@endsection
