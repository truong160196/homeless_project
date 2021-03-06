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
        @if($account)
            <input type="hidden" id="id_user" value="{{$account->id}}">
        @endif
    <div class="account">
        <div class="container">
            <div class="tabs">
                <a href="{{route('user.page.account')}}" class="btn btn-secondary btn-tab" data-index="0">Dashboard</a>
                <a href="{{route('user.page.deposit')}}" class="btn btn-secondary btn-tab active" data-index="1">Deposit</a>
                <a href="{{route('user.page.withdraw')}}" class="btn btn-secondary btn-tab " data-index="2">Withdraw</a>
                <a href="{{route('account.logout')}}" class="btn btn-secondary btn-tab ">Logout</a>
            </div>
            <div class="tab-content">
                <div class="blog-sidebar dashboard row">
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
                            <p>Token will be deposited after 12 network confirmations.</p>
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
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="widget about-widget">
                            <h3>Address</h3>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    readonly
                                    value="0x4a1c38838a3f71dca80001ea26694f005728eaad"
                                />
                            </div>
                            <div class="form-group button-depoist">
                                <button class="btn btn-info btn-deposit">Copy Address</button>
                                <button class="btn btn-warning btn-deposit">Show QR Code</button>
                            </div>
                            <strong>Send only USD and ETH to this deposit address.</strong>
                            <p>Sending currency other than ETH, USD to this address may result in the loss of your deposit.</p>
                        </div>
                        <div class="widget about-widget">
                            <h3>Smart contract address</h3>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    readonly
                                    value="0xb527FdE93d1dcC4F192E3eE42B219C0D81789F67"
                                />
                            </div>
                            <div class="form-group button-depoist">
                                <button
                                    type="button"
                                    class="btn btn-danger btn-deposit"
                                    onclick="getDonateFree()"
                                >
                                    Get $100 free
                                </button>
                            </div>
                            <strong>Note</strong>
                            <p>This is a demo for donate deposit service. You can get free $100 here</p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="widget about-widget">
                            <h3>Deposit History</h3>
                            <div class="table-history">
                                <table id="table_deposit" class="table table-striped">
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
    </section>
@endsection

@section('js')
    <script src="{{asset('assets/js_user/page/account.js')}}"></script>
@endsection

