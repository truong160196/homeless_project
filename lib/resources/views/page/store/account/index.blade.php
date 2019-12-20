@extends('layout_store.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/store.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <section class="header">
        <div class="company-name">
            <h3>KAMEREO</h3>
        </div>
        <div class="right-header">
            <ul>
                <li>
                    <a href="#" class="">
                        <i class="far fa-envelope"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <i class="fas fa-shopping-cart">
                            <span class="icon-bar">4</span>
                        </i>
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                        <button
                                class="btn btn-light dropdown-toggle select-lang"
                                type="button" id="lang"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                            ENG
                        </button>
                        <div class="dropdown-menu" aria-labelledby="lang">
                            <a class="dropdown-item" href="#">ENG</a>
                            <a class="dropdown-item" href="#">VN</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle select-user" type="button" id="usermenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="account">
                                <div class="avatar">
                                    <img src="https://yoast.com/app/uploads/2019/04/Meike_bubble-250x285.png" />
                                </div>
                                <div class="info-user">
                                    <h5>Taku Tanaka</h5>
                                    <p>Administrator</p>
                                </div>
                            </div>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="nav-bar-menu">
        <div class="menu-top-header">
            <div class="store">
                <div class="avatar">
                    <img src="https://eon51.com/wp-content/uploads/2018/05/logo-tng-51.png">
                </div>
                <div class="store-info">
                    <h4>KAMEREO</h4>
                    <p>135 Hai Ba Trung</p>
                </div>
            </div>
            <div class="changeInfo">
                <a href="#" class="btn-changeInfo">CHANGE STORE</a>
            </div>
        </div>
        <div class="favorite-item">
            <i class="fas fa-heart"></i>
            <h4>FAVORITE ITEMS</h4>
        </div>
        <ul class="sidebar-nav">
            <h4>Dashboard</h4>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-history"></i>
                        <p>Overview</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-scroll"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-luggage-cart"></i>
                        <p>Suppliers List</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <p>Statistic</p>
                    </a>
                </li>
            </ul>
            <h4>Market Place</h4>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-store"></i>
                        <p>Market</p>
                    </a>
                </li>
            </ul>
            <h4>General Setting</h4>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-building"></i>
                        <p>Company Info</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fab fa-app-store-ios"></i>
                        <p>Store Info</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
                    </a>
                </li>
            </ul>
        </ul>
    </section>
    <section class="body-main">
        <div class="page-header">
            <h4>Store Information</h4>
        </div>
        <div class="page-body row">
            <div class="col-sm-12 col-lg-5">
                <div class="card card-info">
                    <div class="card-body">
                        <div class="avatar">
                            <img src="https://eon51.com/wp-content/uploads/2018/05/logo-tng-51.png">
                        </div>
                        <h4>STORE INFO.</h4>
                        <table>
                            <tbody>
                                <col width="40%" />
                                <col width="60%" />
                                <tr>
                                    <td class="label">Name:</td>
                                    <td class="content">K.O.I The.</td>
                                </tr>
                                <tr>
                                    <td class="label">Address:</td>
                                    <td class="content">521 Hồ Tùng Mậu, D1, HCM</td>
                                </tr>
                                <tr>
                                    <td class="label">Phone #:</td>
                                    <td class="content">(338) 886-9944</td>
                                </tr>
                            </tbody>
                        </table>
                        <h4>RED INVOICE INFO.</h4>
                        <table>
                            <tbody>
                                <col width="40%" />
                                <col width="60%" />
                                <tr>
                                    <td class="label">Company Name:</td>
                                    <td class="content">K.O.I The International Company</td>
                                </tr>
                                <tr>
                                    <td class="label">Address:</td>
                                    <td class="content">9682 Wakehurst Avenue Arlington Heights, IL, 60004</td>
                                </tr>
                                <tr>
                                    <td class="label">MST:</td>
                                    <td class="content">P77744944</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-secondary btn-edit-user" data-toggle="modal" data-target="#modal-user">Edit Profile</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-7">
                <div class="card card-info">
                    <div class="card-body">
                        <h5>DELIVERY DEFAULT MESSAGE</h5>
                        <form class="form-update-user">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <textarea class="form-control" rows="2" placeholder="Write your message"></textarea>
                            </div>
                            <div class="form-check disabled">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <textarea class="form-control" rows="2" placeholder="Write your message"></textarea>
                            </div>
                            <div class="form-check disabled">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <textarea class="form-control" rows="2" placeholder="Write your message"></textarea>
                            </div>
                            <div class="form-check disabled">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <textarea class="form-control" rows="2" placeholder="Write your message"></textarea>
                            </div>
                            <div class="form-check disabled">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <textarea class="form-control" rows="2" placeholder="Write your message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary btn-update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade modal-update-user" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">EDIT STORE PROFILE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-sm-12 col-lg-4" >
                                <h4>STORE IMAGE</h4>
                                <div class="avatar">
                                    <img src="https://eon51.com/wp-content/uploads/2018/05/logo-tng-51.png">
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-remove">Remove</button>
                                    <button type="button" class="btn btn-secondary btn-upload">Upload Image</button>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-8" >
                                <form>
                                    <h4>BASIC INFO</h4>
                                    <div class="form-group">
                                        <label>Store Name</label>
                                        <input type="button" class="form-control" placeholder="Enter Store Name" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_admin/dashboard.js')}}"></script>--}}
@endsection

