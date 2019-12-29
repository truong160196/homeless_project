@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/home.css')}}" rel="stylesheet">
@endsection

@section('page_content')

<!-- start page-wrapper -->
    @include('layout_user.slider')
    <!-- start features-section -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="feature-grids clearfix">
                        <div class="grid">
                            <div class="header">
                                <img src="assets/images/add/f1.png" alt="">
                            </div>
                            <div class="details">
                                <h3>Healp The Child</h3>
                                <p>We connects nonprofits, donors, and companies in nearly every country around.</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="header">
                                <img src="assets/images/add/f4.png" alt="">
                            </div>
                            <div class="details">
                                <h3>Become a Volunteer</h3>
                                <p>We connects nonprofits, donors, and companies in nearly every country around.</p>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="header">
                                <img src="assets/images/add/f2.png" alt="">
                            </div>
                            <div class="details">
                                <h3>Get Involved</h3>
                                <p>We connects nonprofits, donors, and companies in nearly every country around.</p>
                            </div>
                        </div>

                        <div class="grid">
                            <div class="header">
                                <img src="assets/images/add/f3.png" alt="">
                            </div>
                            <div class="details">
                                <h3>Emergency Case</h3>
                                <p>We connects nonprofits, donors, and companies in nearly every country around.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end features-section -->


    <!-- start case-studies-section -->
    <section class="recent-blog-section bg-w section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col col-md-4 mar-bot-20 recent-cases-thumbs">
                    <div class="recent-cases-thumbs-outer">
                        <h2>Bidding  <span class="theme_color">our auction &amp;</span> helping us by donation</h2>
                        
                        @foreach ($auctions as $auction)
                            <div class="recent-case-thumb " data-case="#case-content-1">
                                <div class="content">
                                    <div class="post">
                                        <div class="img-holder">
                                            <img class="auctions-img" src="{{asset($auction->product_image)}}" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="#">{{$auction->auction_title}}</a></h4>
                                            <span class="date"><i class="ti-timer"></i> FROM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_start_time)->format("H\h i")}}</span>
                                            <br>
                                            <span class="date"><i class="ti-timer"></i> TO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_end_time)->format('H\h i\'')}}</span>
                                        </div>
                                    </div>
                                    <div class="dates">
                                        <p>{{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_start_time)->format('d')}} 
                                        <span>
                                            {{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_start_time)->format('M')}}
                                        </span></p>
                                    </div>
                                </div>
                                <div class="overlay-text">
                                    <div class="text-inner">
                                        <h3>{{$auction->auction_title}}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col col-md-4 mar-bot-20 recent-cases-content">
                    <div class="recent-cases-content-outer">
                        @foreach ($donates_left as $donate)
                            <div class="recent-case-data active-case-data" id="case-content-{{$donate->id}}">
                                <img src="{{asset($donate->donate_image)}}" alt="" />
                                <div class="content-meta">
                                    <div class="skills">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="progress-bar" data-percent="{{ number_format($donate->donate_raised / $donate->donate_goal * 100, 2) }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="#">{{$donate->donate_title}}</a> </h3>
                                    <div class="meta">
                                        <div class="goal">
                                            <p> Goal : <span class="color-yeollo">{{number_format($donate->donate_goal)}}$</span></p>
                                        </div>
                                        <div class="raised">
                                            <p> Raised <span class="color-green">{{number_format($donate->donate_raised)}}$</span></p>
                                        </div>
                                    </div>
                                    <p class="talk">{{$donate->donate_detail}}</p>
                                    <a href="{{route('user.page.donate.donate', ['id' => $donate->id])}}" class="theme-btn-s4">Donate Now</a>
                                    <a href="{{route('user.page.donate.detail', ['id' => $donate->id])}}" class="theme-btn-s5">Read Now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col col-md-4 mar-bot-20">
                    @if(count($donates_right) > 1)
                        <div class=" event-slider">
                            @foreach ($donates_right as $donate)
                                <div class="slider">
                                    <img src="{{asset($donate->donate_image)}}" alt="" />
                                    <div class="content-meta">
                                        <div class="skills">
                                            <div class="skill">
                                                <div class="progress">
                                                    <div class="progress-bar" data-percent="{{ number_format($donate->donate_raised / $donate->donate_goal * 100, 2) }}"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3><a href="#">{{$donate->donate_title}}</a> </h3>
                                        <div class="meta">
                                            <div class="goal">
                                                <p> Goal : <span class="color-yeollo">{{number_format($donate->donate_goal)}}$</span></p>
                                            </div>
                                            <div class="raised">
                                                <p> Raised <span class="color-green">{{number_format($donate->donate_raised)}}$</span></p>
                                            </div>
                                        </div>
                                        <p class="talk">{{$donate->donate_detail}}</p>
                                        <a href="{{route('user.page.donate.donate', ['id' => $donate->id])}}" class="theme-btn-s4">Donate Now</a>
                                        <a href="{{route('user.page.donate.detail', ['id' => $donate->id])}}" class="theme-btn-s5">Read Now</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class=" event-slider-singe">
                            @foreach ($donates_right as $donate)
                                <div class="slider">
                                    <img src="{{asset($donate->donate_image)}}" alt="" />
                                    <div class="content-meta">
                                        <div class="skills">
                                            <div class="skill">
                                                <div class="progress">
                                                    <div class="progress-bar" data-percent="{{ number_format($donate->donate_raised / $donate->donate_goal * 100, 2) }}"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3><a href="#">{{$donate->donate_title}}</a> </h3>
                                        <div class="meta">
                                            <div class="goal">
                                                <p> Goal : <span class="color-yeollo">{{number_format($donate->donate_goal)}}$</span></p>
                                            </div>
                                            <div class="raised">
                                                <p> Raised <span class="color-green">{{number_format($donate->donate_raised)}}$</span></p>
                                            </div>
                                        </div>
                                        <p class="talk">{{$donate->donate_detail}}</p>
                                        <a href="{{route('user.page.donate.donate', ['id' => $donate->id])}}" class="theme-btn-s4">Donate Now</a>
                                        <a href="{{route('user.page.donate.detail', ['id' => $donate->id])}}" class="theme-btn-s5">Read Now</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end case-studies-section -->


    <!-- start about-section -->
    <section class="about-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-6">
                    <div class="grid-left">
                        <div class="details">
                            <h3><a href="#">Warmth <span class="color-yeollo"> & True Support </span> For Needed People </a></h3>

                        </div>
                        <div class="img-holder">
                            <img src="assets/images/about/about.jpg" alt>
                            <div class="video-holder">
                                <a href="https://www.youtube.com/embed/7e90gBu4pas?autoplay=1" class="video-btn"  data-type="iframe" tabindex="0"><i class="fi flaticon-play-button-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="grid-right">
                        <div class="img-holder-2">
                            <img src="assets/images/about/img-1.jpg" alt>
                        </div>
                        <div class="details">

                            <h3><a href="#"><span>All they wanted was the chance to do good for others.</span> </a></h3>
                            <p>Help the homeless better access basic daily human necessities such as food, clothing, and shelter</p>
                            <a href="#" class="theme-btn-s2">Read More About</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end about-section -->

    <!-- start cta-section-s2 -->
    <section class="cta-section-s2 cta-layer cta-bg">
        <div class="container ">
            <div class="row">
                <div class="col col-lg-10 col-sm-8">
                    <div class="text">
                        <h2>Join your hand with us for a better life and  beautiful future</h2>
                    </div>
                    <div class="icon">
                        <img src="assets/images/add/c-1.png" alt="">
                    </div>
                </div>
                <div class="col col-lg-2 col-sm-4">
                    <div class="contact-info">

                        <a href="#" class="theme-btn-s7">Join with us</a>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end cta-section-s2 -->

    <!-- start project-section-s2 -->
    <section class="project-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col col-lg-6 col-lg-offset-3">
                    <div class="section-title-s3">
                        <span>Recently Finished</span>
                        <h2>Happy Moments</h2>
                    </div>
                </div>
                <div class="col col-xs-12">
                    <div class="sortable-grids">
                        <div class="grids-filters isotope-filter-center">
                            <ul>
                                <li><a data-filter="*" href="#" class="current">All</a></li>
                                <li><a data-filter=".building" href="#">Child</a></li>
                                <li><a data-filter=".interior" href="#">Charity</a></li>
                                <li><a data-filter=".commercial" href="#">Volunteering</a></li>
                                <li><a data-filter=".residential" href="#">Sponsorship</a></li>
                                <li><a data-filter=".plants" href="#">Plants</a></li>
                            </ul>
                        </div>
                        <div class="projects-grids grids-container">
                            <div class="grid interior commercial">
                                <div class="img-holder">
                                    <a href="assets/images/portfolio/img-1.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-1.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid building residential">
                                <div class="img-holder">
                                    <a href="assets/images/portfolio/img-2.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-2.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid interior residential">
                                <div class="img-holder">
                                    <a href="assets/images/portfolio/img-3.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-3.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid building commercial">
                                <div class="img-holder">
                                    <a href="assets/images/portfolio/img-4.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-4.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid residential plants">
                                <div class="img-holder">
                                    <a href="assets/images/portfolio/img-5.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-5.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid commercial ">
                                <div class="img-holder">
                                    <a href="assets/images/project-single/img-1.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/project-single/img-1.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid residential plants">
                                <div class="img-holder">
                                    <a href="assets/images/project-single/img-5.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/project-single/img-5.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid building commercial plants">
                                <div class="img-holder">
                                    <a href="assets/images/project-single/img-4.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/project-single/img-4.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid interior commercial">
                                <div class="img-holder">
                                    <a href="assets/images/project-single/img-2.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/project-single/img-2.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end project-section-s2 -->
@endsection

@section('js')
    <script src="{{asset('assets/js_user/page/home.js')}}"></script>
@endsection

