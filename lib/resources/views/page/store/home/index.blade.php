@extends('layout_store.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/store.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <!-- start shop-pg-section -->
    <section class="shop-pg-section">
        <div class="row">
            <div class="col-sm-12 col-lg-5 payment-panel">
                <div class="search-product row">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter name product">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success">Search</button>
                    </div>
                </div>
                <div class="scrollable">
                    <table class="table table-striped table-store">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody id="table-striped-left">

                        </tbody>
                    </table>
                </div>
                <div class="pay-out">
                    <table>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                <td>325,45$</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>3,25$</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>3,25$</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-lg-7 row shop-panel">
                <div class="col col-xs-12">
                    <div class="shop-grids" id="shop-grids">
                    </div>                  
                    <div class="pagination-wrapper pagination-wrapper-left">
                        <ul class="pg-pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <i class="fi flaticon-back"></i>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <i class="fi flaticon-next"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div> <!-- end container -->  
    </section>
    <!-- end shop-pg-section -->
@endsection

@section('js')
<script src="{{asset('assets/js_admin/page/store.js')}}"></script>
@endsection

