@extends('layout_store.main')

@section('page_title')
    Dashboard
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/dashboard.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <section class="body-main">
        <div class="container">
            <div class="page-header">
                <h4>Store Information</h4>
            </div>
            <div class="page-body row">
                <div class="col-sm-12 col-lg-12 row">
                    <div class="col-sm-12 col-lg-4 card-info">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <p class="card-category">Order</p>
                                <h3 class="card-title">12</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-4 card-info">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store</i>
                                </div>
                                <p class="card-category">Revenue</p>
                                <h3 class="card-title">$34,245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12  col-lg-4 card-info">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person</i>
                                </div>
                                <p class="card-category">Customer</p>
                                <h3 class="card-title">25</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-12 card-info">
                        <div class="card card-stats">
                            <div class="card-body table-responsive">
                                <h4>Order History</h4>
                                <table id="table_order" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">no#</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Hash</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('assets/js_store/page/dashboard.js')}}"></script>
@endsection

