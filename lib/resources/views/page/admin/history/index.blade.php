@extends('layout_admin.main')

@section('page_title')
{{--{{$page_title}}--}}
    History
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/history.css')}}" rel="stylesheet">
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
                                <div class="card-body">
                                    <table id="table_history" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Action</th>
                                            <th scope="col">Currency</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/history.js')}}"></script>
@endsection
