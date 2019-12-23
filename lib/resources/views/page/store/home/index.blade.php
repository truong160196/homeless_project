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
            <div class="col-sm-12 col-lg-5">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="search-product">
                            <input
                                type="text"
                                class="form-control"
                                id="keyword"
                                name="keyword"
                                placeholder="Enter name product or SKU"
                            >
                            <button type="button" class="btn btn-warning" id="btn_search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card card-stats" style="margin-top: 20px;">
                    <div class="card-body">
                        <div class="scrollable">
                            <ul id="list_product">
                            </ul>
                        </div>
                    </div>
                </div>

                <li id="clone" style="display: none">
                    <div class="title">
                        <h4 class="title_product"></h4>
                        <p class="title_sku"></p>
                    </div>
                    <div class="price">
                        <p class="price_text"></p>
                    </div>
                    <div class="qty">
                        <input
                            type="number"
                            class="form-control input-qty"
                        />
                    </div>
                    <div class="total">
                        <p class="total_text"></p>
                    </div>
                    <div class="action">
                        <button
                            type="button"
                            class="btn btn-danger btn-remove"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </li>

                <div class="pay-out">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Total</td>
                                <td id="total"></td>
                            </tr>
                            <tr>
                                <td>Tax (10%)</td>
                                <td id="tax"></td>
                            </tr>
                            <tr>
                                <td>Total Payment</td>
                                <td id="total_payment"></td>
                            </tr>
                            </tbody>
                        </table>
                </div>
                <div class="payment">
                    <button type="button" id="submit_payment" class="btn btn-success">Payment</button>
                </div>
            </div>
            <div class="col-sm-12 col-lg-7 row" style="padding: 0 30px">
                <div class="col col-xs-12 shop-panel">
                    <div class="shop-grids" id="shop_grids">
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

