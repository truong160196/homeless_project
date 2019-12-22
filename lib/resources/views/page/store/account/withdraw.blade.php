@extends('layout_store.main')

@section('page_title')
    Withdraw
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
                    <a href="{{route('store.page.account')}}" class="btn btn-secondary btn-tab =" data-index="0">Dashboard</a>
                    <a href="{{route('store.page.account.deposit')}}" class="btn btn-secondary btn-tab " data-index="1">Deposit</a>
                    <a href="{{route('store.page.account.withdraw')}}" class="btn btn-secondary btn-tab active" data-index="2">Withdraw</a>
                </div>
                <div class="tab-content">
                    <div class="dashboard row">
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
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="wallet"
                                        id="wallet"
                                        readonly
                                        value=""
                                    />
                                </div>
                                <h1 id="balanceDonate">0 USD</h1>
                                <p>Token will be withdraw after admin approved</p>
                            </div>
                            <div class="widget about-widget">
                                <div class="widget-title">
                                    <h3>Ethereum Balance</h3>
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
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="widget about-widget">
                                <h3>Address</h3>
                                <form id="form_withdraw">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <select class="form-control" id="token" name="token">
                                            <option value="USD">USD</option>
                                            <option value="ETH">ETH</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="address_wallet"
                                            name="address_wallet"
                                            placeholder="Enter receive address"
                                            data-parsley-validation-threshold="1"
                                            data-parsley-trigger="keyup"
                                            maxlength="255"
                                            required
                                            data-parsley-required-message="Address is required."
                                            value="0xaC8832ae0C56f638bC07822f90b24A4f8d721B2D"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter value receive"
                                            id="amount"
                                            name="amount"
                                            min="0"
                                            step="0.01"
                                            data-parsley-validation-threshold="1"
                                            data-parsley-trigger="keyup"
                                            maxlength="255"
                                            required
                                            data-parsley-required-message="Value is required."
                                            value="10"
                                            data-parsley-type="number"
                                        />
                                    </div>
                                    <div class="form-group button-depoist">
                                        <button type="button" id="btn_withdraw" class="btn btn-info btn-deposit">Send Token</button>
                                    </div>
                                </form>
                                <strong>Send only USD and ETH to this deposit address.</strong>
                                <p>Sending currency other than ETH, USD to this address may result in the loss of your deposit.</p>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="widget about-widget">
                                <h3>Withdraw History</h3>
                                <div class="table-history">
                                    <table id="table_withdraw" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Action</th>
                                            <th scope="col">Currency</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date Withdraw</th>
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
        <script src="{{asset('assets/js_user/page/store.js')}}"></script>
@endsection

