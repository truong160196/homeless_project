@extends('layout_store.main')

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
                <a href="{{route('store.page.store.account')}}" class="btn btn-secondary btn-tab active" data-index="0">Dashboard</a>
                <a href="{{route('store.page.store.account.deposit')}}" class="btn btn-secondary btn-tab " data-index="1">Deposit</a>
                <a href="{{route('store.page.store.account.withdraw')}}" class="btn btn-secondary btn-tab " data-index="2">Withdraw</a>
            </div>
            <div class="tab-content">
                <div class="blog-sidebar dashboard row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="widget about-widget">
                            <h3>About</h3>
                            <div class="img-holder">
                                <img src="{{asset('assets/images/user.png')}}" alt="">
                            </div>
                            @if($account)
                                <input type="hidden" id="id_user" value="{{$account->id}}">
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
                            @endif
                            <button
                                type="button"
                                class="btn btn-secondary btn-edit-user"
                                id="btn_open_modal_user"
                                name="btn_open_modal_user"
                            >
                                Edit Profile
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="widget about-widget">
                            <div class="widget-title">
                                <h3>Account Balance</h3>
                                <button
                                    type="button"
                                    class="btn btn-success btn-sync"
                                    onclick="loadBalanceEth()"
                                >
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>

                            <h1 id="balanceEth">0 ETH</h1>
                            <p id="estimateUSD">Estimated Value: ~ 0 USD</p>
                        </div>
                        <div class="widget about-widget">
                            <div class="widget-title">
                                <h3>Donate Balance</h3>
                                <button
                                    type="button"
                                    class="btn btn-success btn-sync"
                                    onclick="loadBalanceDonate()"
                                >
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                            <h1 id="balanceDonate">0 USD</h1>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="widget about-widget">
                            <h3>History</h3>
                            <div class="table-history">
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
        @include('page.user.account.modalEditUser')
    </section>
@endsection

@section('js')
    <script src="{{asset('assets/js_user/page/store.js')}}"></script>
@endsection

