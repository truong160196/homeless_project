@extends('layout_admin.main')

@section('page_title')
{{--{{$page_title}}--}}
    Order
@endsection

@section('css')
    <link href="{{asset('assets/css_admin/page/order.css')}}" rel="stylesheet">
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
                        <table class="table display responsive nowrap table-caterers cursor-pointer" id="order_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>Tax</th>
                                <th>Hash</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
     </div>
@include('page.admin.order.modalViewOrder')
@endsection

@section('js')
    <script src="{{asset('assets/js_admin/page/order.js')}}"></script>
@endsection
