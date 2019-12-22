@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/auction.css')}}" rel="stylesheet">
@endsection

@section('page_content')
    <!-- start page-title -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="page-title" id="auction_id" data-id="{{$auction->id}}">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>{{$auction->auction_title}}</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <!-- start portfolio-section -->
    @if ($type != "new")
        <section class="recent-blog-section">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="recent-cases-content-outer">
                            <div class="recent-case-data active-case-data" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="widget recent-post-widget top-auction">
                                            <h3>
                                                Top auction
                                            </h3>
                                            <div class="posts">
                                                @foreach ($auctions_history as $auction_history)
                                                    <div class="post">
                                                        <div class="details">
                                                            <h4>
                                                                <i class="fas fa-user"></i>
                                                                {{$auction_history->name}}
                                                            </h4>
                                                            <span class="date">
                                                                <i class="fas fa-hand-holding-usd"></i>
                                                                {{number_format($auction_history->value)}} $
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="content-meta group-auction">
                                            <div class="meta">
                                                <div class="goal">
                                                    <p> Current price : <span class="color-yeollo">{{number_format($current_price)}} $</span></p>
                                                </div>

                                                <div class="goal">
                                                    <p> Starting price : <span class="color-yeollo">{{number_format($auction->auction_raised)}} $</span></p>
                                                </div>
                                            </div>

                                            <div class="meta">
                                                <div class="goal-100">
                                                    <p> From : <span>{{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_start_time)->format('m/d/y - h\h i\'')}}</span></p>
                                                </div>

                                                <div class="goal-100">
                                                    <p> To : <span>{{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_end_time)->format('m/d/y - h\h i\'')}}</span></p>
                                                </div>
                                            </div>

                                            <div class="group-count-down">
                                                <div id="timer" data-time="{{$auction->auction_end_time}}"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Price</label>
                                                <input id="auction-price" type="number" class="form-control" value="{{$current_price + 100}}" data-current="{{$current_price}}">
                                                <p class="auction-valid"></p>
                                            </div>
                                            <button data-id="{{$auction->id}}" $type="button" id="auction-submit" class="theme-btn-s4">Bidding</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
    @endif
    <!-- end portfolio-section -->

    <!-- start project-sigle-section -->
    <section class="project-sigle-section recent-blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8">
                    <div class="img-holder">
                        <img src="{{$auction->product_image}}" alt=''>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="project-info">
                        <h3>{{$auction->product_title}}</h3>
                        <ul>
                            <li><span>Start Date:</span> {{$auction->auction_start_time}}</li>
                            <li><span>End Date:</span> {{$auction->auction_end_time}}</li>
                            <li><span>Raised:</span> {{$auction->auction_raised}} $</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end project-sigle-section -->

    <!-- start project-sigle-section -->
    <section class="project-sigle-section recent-blog-section">
        <div class="container">
            <div class="col col-xs-12">
                <div class="project-single-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-area">
                                <h2>{{$auction->auction_title}}</h2>
                                <p>{{$auction->auction_detail}}</p>
                                <hr />
                                <h2>{{$auction->product_title}}</h2>
                                <p>{{$auction->product_detail}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end project-sigle-section -->

    <!-- start project-sigle-section -->
    <section class="fun-fact-section section-padding pt0">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>Doing the right thing, at the right time.</h2>
                    <div class="fun-fact-grids clearfix">
                        <div class="grid">
                            <div class="info">
                                <h3><span class="odometer odometer-auto-theme" data-count="250"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">2</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">5</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>+</h3>
                                <p>Delivered Packages</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="info">
                                <h3><span class="odometer odometer-auto-theme" data-count="177"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">7</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">7</span></span></span></span></span></div></span>+</h3>
                                <p>Years of Experience</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="info">
                                <h3><span class="odometer odometer-auto-theme" data-count="130"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">3</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>+</h3>
                                <p>Countries Covered</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="info">
                                <h3><span class="odometer odometer-auto-theme" data-count="100"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>%</h3>
                                <p>Satisfied customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end project-sigle-section -->
@endsection

@section('js')
    <script src="{{asset('assets/js_user/page/auction.js')}}"></script>
@endsection

