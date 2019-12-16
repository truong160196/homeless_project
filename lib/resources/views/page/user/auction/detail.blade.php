@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
{{--    <link href="{{asset('assets/css_user/page/auction.css')}}" rel="stylesheet">--}}
@endsection

@section('page_content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>Supply Quality Foods To Africa's Village Area</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start project-sigle-section -->
    <section class="project-sigle-section recent-blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8">
                    <div class="img-holder">
                        <img src="{{asset('assets/images/project-single/img-1.jpg')}}" alt>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="project-info">
                        <h3>Auction Description</h3>
                        <ul>
                            <li><span>Topics:</span> Children around the world are not enrolled in school</li>
                            <li><span>Host:</span> dand dand com: Lmd.</li>
                            <li><span>Start Date:</span> January 17, 2019</li>
                            <li><span>End Date:</span> February 27, 2020</li>
                            <li><span>Raised:</span> 8,000 $</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end project-sigle-section -->

    <!-- start portfolio-section -->
    <section class="recent-blog-section">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="recent-cases-content-outer">
                        <div class="recent-case-data active-case-data" >
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{asset('assets/images/portfolio/img-1.jpg')}}" alt="" />
                                </div>
                                <div class="col-md-6">
                                    <div class="content-meta">
                                        <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                        <div class="meta">
                                            <div class="goal">
                                                <p> Current price : <span class="color-yeollo">17000$</span></p>
                                            </div>
                                        </div>
                                        <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world</p>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" class="form-control" value="1000">
                                        </div>
                                        <a href="#" class="theme-btn-s4">Bidding</a>
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
    <!-- end portfolio-section -->

    <!-- start project-sigle-section -->
    <section class="project-sigle-section recent-blog-section">
        <div class="container">
            <div class="col col-xs-12">
                <div class="project-single-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="content-area">
                                <h2>Event Title Place Here</h2>
                                <p>Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur.Vestibulum id ligula </p>
                                <p>We are non-profit charity & NGO organization Provide help to homeless people! There are many variations of passage of Lorem Ipsum available Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. </p>

                            </div>
                        </div>
                        <div class="col-md-6 mr-top-70">
                            <div class="content-area-img">
                                <img src="{{asset('assets/images/project-single/img-7.jpg')}}" alt="">
                            </div></div>
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
{{--    <script src="{{asset('assets/js_user/page/auction.js')}}"></script>--}}
@endsection

