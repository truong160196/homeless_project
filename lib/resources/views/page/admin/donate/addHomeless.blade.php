@extends('layout_admin.main')

@section('page_title')
    {{--{{$page_title}}--}}
    Donate
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/donate.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <input type="hidden" id="donate_id" name="donate_id" value="{{$donate->id}}">
    <div id="body_users">

    </div>

@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/donate_user.js')}}"></script>
@endsection

