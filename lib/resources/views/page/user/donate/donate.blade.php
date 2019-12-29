@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/donate.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    @if($donate)
                        <h2>{{ $donate->donate_title }}</h2>
                    @endif
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start portfolio-section -->
    <section class="recent-blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12 col-md-8">
                    <form id="form_donate" class="form-horizontal form-donate">
                        @if($account)
                            <input type="hidden" id="id_user" value="{{$account->id}}">
                        @endif
                        <fieldset>
                            <legend>Payment</legend>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Address Donator</label>
                                <div class="col-md-9">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="wallet"
                                        name="wallet"
                                        title="Address wallet"
                                        readonly
                                    >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Homeless Fund</label>
                                <div class="col-md-9">
                                    @if($donate)
                                        <input type="hidden" id="donate_id" name="donate_id" value="{{$donate->id}}">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="homeless_wallet"
                                            name="homeless_wallet"
                                            value="{{$donate->donate_address}}"
                                            title="Address wallet"
                                            readonly
                                        >
                                    @else
                                        <input
                                            type="text"
                                            class="form-control"
                                            title="Address wallet"
                                            readonly
                                        >
                                    @endif
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Donate value</label>
                                <div class="col-md-9">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="amount"
                                        name="amount"
                                        min="0"
                                        title="Value donate"
                                        required
                                    >
                                    <button type="button" class="btn btn-balance" id="btn-max-value">
                                        <span id="balanceDonate">Balance: 0$</span>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <button
                                        type="button"
                                        id="btn_donate"
                                        class="btn btn-lg btn-warning pull-right"
                                        style="margin-left: 15px;"
                                    >
                                        Submit
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-lg btn-info pull-right"
                                    >
                                        Show QR Code
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="col-xs-12 col-md-4">
                    @if($donate)
                    <div class="row">
                        <div class="col-xs-12 image-detail">
                            <img src="{{asset($donate->donate_image)}}" alt="" />
                        </div>

                        <div class="col col-xs-12">
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="{{ number_format($donate->donate_raised / $donate->donate_goal * 100, 2) }}"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">{{ $donate->donate_title }}</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">{{number_format($donate->donate_goal)}}$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">{{number_format($donate->donate_raised)}}$</span></p>
                                    </div>
                                </div>
                                <h3>Help us by share:</h3>
                                <div class="social-icons">
                                    <ul>
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                        <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end portfolio-section -->
@endsection

@section('js')
    <script src="{{asset('assets/js_user/page/donate.js')}}"></script>
@endsection

