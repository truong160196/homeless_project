@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/account.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <!-- start blog-pg-section -->
    <section class="section-padding">
    <div class="account">
        <div class="container">
            <div class="tabs">
                <a href="{{route('user.page.account')}}" class="btn btn-secondary btn-tab active" data-index="0">Dashboard</a>
                <a href="{{route('user.page.deposit')}}" class="btn btn-secondary btn-tab " data-index="1">Deposit</a>
                <a href="{{route('user.page.withdraw')}}" class="btn btn-secondary btn-tab " data-index="2">Withdraw</a>
                <a href="{{route('user.page.setting')}}" class="btn btn-secondary btn-tab " data-index="3">Setting</a>
            </div>
            <div class="tab-content">
                <div class="blog-sidebar dashboard row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="widget about-widget">
                            <h3>About</h3>
                            <div class="img-holder">
                                <img src="{{asset('assets/images/user.png')}}" alt="">
                            </div>
                            <table>
                                <tbody>
                                <col width="40%" />
                                <col width="60%" />
                                <tr>
                                    <td class="label">Username:</td>
                                    <td class="content">{{$account->username}}</td>
                                </tr>
                                <tr>
                                    <td class="label">Name:</td>
                                    <td class="content">{{$account->full_name}}</td>
                                </tr>
                                <tr>
                                    <td class="label">Birthday:</td>
                                    <td class="content">{{$account->birthday}}</td>
                                </tr>
                                <tr>
                                    <td class="label">Phone#:</td>
                                    <td class="content">{{$account->phone}}</td>
                                </tr>
                                <tr>
                                    <td class="label">Address:</td>
                                    <td class="content">{{$account->address}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <button
                                type="button"
                                class="btn btn-secondary btn-edit-user"
                                data-toggle="modal"
                                data-target="#modal-user"
                            >
                                Edit Profile
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="widget about-widget">
                            <h3>Account Balance</h3>
                            <h1>1.35 USDT</h1>
                            <p>Estimated Value: ~ 250 $</p>
                        </div>
                        <div class="widget about-widget">
                            <h3>Donate Balance</h3>
                            <h1>0.5 USDT</h1>
                            <p>Estimated Value: ~ 100 $</p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="widget about-widget">
                            <h3>History</h3>
                            <div class="table-history">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Donate 1000$ for active Food Help For The Hunger People</td>
                                        <td>0x1e24c23ab48e0d6a211e4047af805dbe040ef0d752b449fe3117d9cbc7e48e2d</td>
                                        <td>
                                            <span class="badge badge-success">Success</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Donate 1000$ for active Food Help For The Hunger People</td>
                                        <td>0x1e24c23ab48e0d6a211e4047af805dbe040ef0d752b449fe3117d9cbc7e48e2d</td>
                                        <td>
                                            <span class="badge badge-danger">Fail</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Donate 1000$ for active Food Help For The Hunger People</td>
                                        <td>0x1e24c23ab48e0d6a211e4047af805dbe040ef0d752b449fe3117d9cbc7e48e2d</td>
                                        <td>
                                            <span class="badge badge-success">Success</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_user/page/faq.js')}}"></script>--}}
@endsection

