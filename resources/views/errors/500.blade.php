@extends('layouts.inicio')
@section('content')
 <section class="col-12 section-login">
  <article class="col-12 col-md-6 container-initial order-2 order-md-1">
   <div class="col-10 animated fadeInRight">
    <p class="font-weight-bold my-2 text-center text-white">Lo sentimos, en este momento tenemos problemas técnicos, intentalo más tarde.</p>
   </div>
  </article>
  <aside class="col-12 col-md-6 container-initial order-1 order-md-2">
   <div class="col-12 col-md-9 p-0 text-center animated fadeInLeft">
    <img class="img-fluid w-100" src="{{ asset('/img/elements/logo.png') }}">
   </div>
  </aside>
 </section>
@endsection
