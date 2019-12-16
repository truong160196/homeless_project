<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('/assets/images/favico.png')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <title>@yield('page_title')</title>
   @include('layout_admin.main_css')
  </head>
  <body>
  <div class="wrapper">
    @include('layout_admin.menu')
    <div class="main-panel">
      @include('layout_admin.header')
      <div class="content">
        @yield('page_content')
      </div>
      @include('layout_admin.footer')
    </div>
  </div>
    @include('layout_admin.main_js')
  </body>
</html>
