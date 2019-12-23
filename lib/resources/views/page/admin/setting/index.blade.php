@extends('layout_admin.main')

@section('page_title')
{{--{{$page_title}}--}}
    Setting
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/setting.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css_admin/page/category.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css_admin/page/activity.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css_admin/page/location.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-tabs card-header-success">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                    <i class="material-icons">bug_report</i> Donate Category
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#messages" data-toggle="tab">
                                    <i class="material-icons">code</i> Donate Activity
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#settings" data-toggle="tab">
                                    <i class="material-icons">cloud</i> Location
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        @include('page.admin.setting.donate_category.index')
                    </div>
                    <div class="tab-pane" id="messages">
                        @include('page.admin.setting.donate_activity.index')
                    </div>
                    <div class="tab-pane" id="settings">
                        @include('page.admin.setting.location.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/setting.js')}}"></script>
    <script src="{{asset('assets/js_admin/page/category.js')}}"></script>
    <script src="{{asset('assets/js_admin/page/activity.js')}}"></script>
    <script src="{{asset('assets/js_admin/page/location.js')}}"></script>
@endsection
