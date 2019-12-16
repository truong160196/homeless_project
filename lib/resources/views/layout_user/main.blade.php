<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('/assets/images/favico.png')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <title>@yield('page_title')</title>
   @include('layout_user.main_css')
  </head>
  <body>
  <div class="page-wrapper">
    <!-- start preloader -->
    <div class="preloader">
      <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>
    <!-- end preloader -->

    @include('layout_user.header')
    @yield('page_content')
    @include('layout_user.footer')
    @include('layout_user.main_js')
  </div>
  </body>
</html>
