@extends('layout_admin.main')

@section('page_title')
{{--{{$page_title}}--}}
    User
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/user.css')}}" rel="stylesheet">
@endsection

@section('page_content')
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-stats">
                    <div class="card-body table-responsive">
                        <div class="col-lg-3 col-md-12 col-sm-12 mg-b-10" id="filter_search">
                            <div class="input-group">
                                <input autocomplete="off" type="text" class="form-control" id="filter_text" placeholder="Search..." aria-label="Filter..." aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                    <button class="btn btn-white btn-round btn-just-icon" id="filter_text_btn" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-stats">
                    <div class="card-header card-header-tabs card-header-success">
                        <h4 class="card-title mt-0">List User</h4>
                        <div
                                class="nav-tabs-navigation"
                                style="float: right; position: absolute; right: 10px; top: 10px"
                        >
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <button
                                                type="button"
                                                class="btn nav-link active show"
                                                data-toggle="tab"
                                                id="btn_create_user"
                                        >
                                            <i class="material-icons">add_box</i> Create New User
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table display responsive nowrap table-caterers cursor-pointer" id="user_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
     </div>

    @include('page.admin.user.modalCreateUser')
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/user.js')}}"></script>
@endsection
