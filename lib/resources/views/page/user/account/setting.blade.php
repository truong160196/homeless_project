@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/account.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <!-- start blog-pg-section -->
    <section class="section-padding">
        @if($account)
            <input type="hidden" id="id_user" value="{{$account->id}}">
        @endif
    </section>
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_user/page/faq.js')}}"></script>--}}
@endsection

