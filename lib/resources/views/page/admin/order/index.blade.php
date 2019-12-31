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
