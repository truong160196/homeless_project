<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('/assets/images/favico.png')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <title>@yield('page_title')</title>
   @include('layout_store.main_css')
  </head>
  <body>
  <div class="page-wrapper">
      <div id="hiden_qrcode" class="qrCode-over"></div>
      <div id="over_qrcode" class="qrcode">
          <button type="button" class="btn btn-default btn-close">x</button>
          <div id="qrcode"></div>
      </div>
    @include('layout_store.header')
    @yield('page_content')
    @include('layout_store.main_js')
  </div>
  </body>
</html>
