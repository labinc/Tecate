<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="author" content="LAB INTERACTIVOS">
  <meta name="copyright" content="Tecate">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('/icon.svg') }}" rel="icon">
  <title>{{ config('app.name', 'Tecate') }}</title>
 </head>
 <body>
  <main class="col-12 main">
   <header class="col-5 col-sm-3 col-md-1 container-logo mx-auto ml-sm-4 mr-sm-auto my-sm-2 m-md-3 @if(Request::is(['home', 'question'])) header-site @endif">
    <img class="img-fluid w-100" src="{{ asset('/img/elements/svg/logo.svg') }}">
   </header>
   <section class="col-12 section-middle">
    @yield('content')
    <footer class="col-12 container-footer"></footer>
   </section>
   @extends('extends.alert')
  </main>
  <script src="{{ asset('/js/app.js') }}"></script>
 </body>
</html>
