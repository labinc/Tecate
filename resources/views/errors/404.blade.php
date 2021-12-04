@extends('layouts.inicio')
@section('content')
 <section class="col-12 section-login">
  <article class="col-12 col-md-6 container-initial order-2 order-md-1">
   <div class="animated fadeInRight">
    <div class="col-11 col-md-9 mx-auto">
     <img class="img-fluid w-100" src="{{ asset('/img/elements/page-not.png') }}">
    </div>
    <div class="mt-5">
     <div class="col-5 col-sm-4 my-4 my-md-3 mx-auto">
      <a class="btn btn-block p-0" href="{{ route('/') }}">
       <img class="img-fluid w-100" src="{{ asset('/img/elements/btn-back.png') }}">
      </a>
     </div>
    </div>
   </div>
  </article>
  <aside class="col-12 col-md-6 container-initial order-1 order-md-2">
   <div class="col-12 col-md-9 p-0 text-center animated fadeInLeft">
    <img class="img-fluid w-100" src="{{ asset('/img/elements/logo.png') }}">
   </div>
  </aside>
 </section>
@endsection
