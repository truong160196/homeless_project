@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
{{--    <link href="{{asset('assets/css_user/page/home.css')}}" rel="stylesheet">--}}
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
                                <a href="#" class="read-more">Join us Now</a>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="header">
                                <img src="assets/images/add/f4.png" alt="">
                            </div>
                            <div class="details">
                                <h3>Become a Volunteer</h3>
                                <p>We connects nonprofits, donors, and companies in nearly every country around.</p>

                                <a href="#" class="read-more">Join us Now</a>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="header">
                                <img src="assets/images/add/f2.png" alt="">
                            </div>
                            <div class="details">
                                <h3>Get Involved</h3>
                                <p>We connects nonprofits, donors, and companies in nearly every country around.</p>
                                <a href="#" class="read-more">Join us Now</a>
                            </div>
                        </div>

                        <div class="grid">
                            <div class="header">
                                <img src="assets/images/add/f3.png" alt="">
                            </div>
                            <div class="details">
                                <h3>Emergency Case</h3>
                                <p>We connects nonprofits, donors, and companies in nearly every country around.</p>
                                <a href="#" class="read-more">Join us Now</a>
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
                        <div class="recent-case-thumb " data-case="#case-content-1">
                            <div class="content">
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="assets/images/project-single/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Gear up for giving</a></h4>
                                        <span class="date"><i class="ti-timer"></i> at 5.00 pm - 7.30 pm</span>
                                        <br>
                                        <span class="date"><i class="ti-timer"></i>  25 Newyork City.</span>
                                    </div>
                                </div>
                                <div class="dates">
                                    <p>16 <span>Feb</span></p>
                                </div>
                            </div>
                            <div class="overlay-text">
                                <div class="text-inner">
                                    <h3>Gear up for giving</h3>
                                </div>
                            </div>
                        </div>
                        <div class="recent-case-thumb" data-case="#case-content-2">
                            <div class="content">
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="assets/images/project-single/img-3.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4><a href="#"> Foods For Poor</a></h4>
                                        <span class="date"><i class="ti-timer"></i> at 5.00 pm - 7.30 pm</span>
                                        <br>
                                        <span class="date"><i class="ti-timer"></i>  25 Newyork City.</span>
                                    </div>
                                </div>
                                <div class="dates">
                                    <p>17 <span>Feb</span></p>
                                </div>
                            </div>
                            <div class="overlay-text">
                                <div class="text-inner">
                                    <h3>Foods For Poor</h3>
                                </div>
                            </div>
                        </div>
                        <div class="recent-case-thumb" data-case="#case-content-3">
                            <div class="content">
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="assets/images/project-single/img-4.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Save The Water</a></h4>
                                        <span class="date"><i class="ti-timer"></i> at 5.00 pm - 7.30 pm</span>
                                        <br>
                                        <span class="date"><i class="ti-timer"></i>  25 Newyork City.</span>
                                    </div>
                                </div>
                                <div class="dates">
                                    <p>23 <span>Feb</span></p>
                                </div>
                            </div>
                            <div class="overlay-text">
                                <div class="text-inner">
                                    <h3> Save The Water</h3>
                                </div>
                            </div>
                        </div>
                        <div class="recent-case-thumb" data-case="#case-content-4">
                            <div class="content">
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="assets/images/project-single/img-5.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Help The Children</a></h4>
                                        <span class="date"><i class="ti-timer"></i> at 5.00 pm - 7.30 pm</span>
                                        <br>
                                        <span class="date"><i class="ti-timer"></i>  25 Newyork City.</span>
                                    </div>
                                </div>
                                <div class="dates">
                                    <p>27 <span>Feb</span></p>
                                </div>
                            </div>
                            <div class="overlay-text">
                                <div class="text-inner">
                                    <h3>Help The Children</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4 mar-bot-20 recent-cases-content">
                    <div class="recent-cases-content-outer">
                        <div class="recent-case-data active-case-data" id="case-content-1">
                            <img src="assets/images/portfolio/img-1.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="75"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us</p>
                                <a href="#" class="theme-btn-s4">Donate Now</a>
                                <a href="#" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                        <div class="recent-case-data" id="case-content-2">
                            <img src="assets/images/portfolio/img-2.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="45"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us</p>
                                <a href="#" class="theme-btn-s4">Donate Now</a>
                                <a href="#" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                        <div class="recent-case-data" id="case-content-3">
                            <img src="assets/images/portfolio/img-3.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="85"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us</p>
                                <a href="#" class="theme-btn-s4">Donate Now</a>
                                <a href="#" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                        <div class="recent-case-data" id="case-content-4">
                            <img src="assets/images/portfolio/img-4.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="35"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us</p>
                                <a href="#" class="theme-btn-s4">Donate Now</a>
                                <a href="#" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4 mar-bot-20">
                    <div class=" event-slider">
                        <div class="slider">
                            <img src="assets/images/portfolio/img-3.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="55"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us</p>
                                <a href="#" class="theme-btn-s4">Donate Now</a>
                                <a href="#" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                        <div class="slider">
                            <img src="assets/images/portfolio/img-2.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="75"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us</p>
                                <a href="#" class="theme-btn-s4">Donate Now</a>
                                <a href="#" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                        <div class="slider">
                            <img src="assets/images/portfolio/img-5.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="75"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us</p>
                                <a href="#" class="theme-btn-s4">Donate Now</a>
                                <a href="#" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                    </div>
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

                            <h3><a href="#">Over <span class="color-yeollo">250 Million</span>  Children Around The World Are <span>Out Of School.</span> </a></h3>
                            <p>Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
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

    <!-- start recent-project-section -->
    <section class="recent-project-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6 col-lg-offset-3">
                    <div class="section-title-s3">
                        <span>See Recent Work</span>
                        <h2>Recent Case Studies</h2>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->

        <div class="content-area">
            <div class="case-grids projects-slider">
                <div class="grid">
                    <div class="inner">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-1.jpg" alt>
                        </div>
                        <div class="details">
                            <div class="info">
                                <h3><a href="#">Save the children</a></h3>
                                <p class="cat"> <a href="">Vew Details</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="content-meta">
                        <div class="skills">
                            <div class="skill">
                                <div class="progress">
                                    <div class="progress-bar" data-percent="75"></div>
                                </div>
                            </div>
                        </div>
                        <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                        <div class="meta">
                            <div class="goal">
                                <p> Goal : <span class="color-yeollo">17000$</span></p>
                            </div>
                            <div class="raised">
                                <p> Raised <span class="color-green">8000$</span></p>
                            </div>
                        </div>
                        <a href="#" class="theme-btn-s4">Donate Now</a>
                    </div>
                </div>
                <div class="grid">
                    <div class="inner">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-2.jpg" alt>
                        </div>
                        <div class="details">
                            <div class="info">
                                <h3><a href="#">Save the children</a></h3>
                                <p class="cat"> <a href="">Vew Details</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="content-meta">
                        <div class="skills">

                            <div class="skill">
                                <div class="progress">
                                    <div class="progress-bar" data-percent="95"></div>
                                </div>
                            </div>
                        </div>
                        <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                        <div class="meta">
                            <div class="goal">
                                <p> Goal : <span class="color-yeollo">17000$</span></p>
                            </div>
                            <div class="raised">
                                <p> Raised <span class="color-green">8000$</span></p>
                            </div>
                        </div>
                        <a href="#" class="theme-btn-s4">Donate Now</a>
                    </div>
                </div>
                <div class="grid">
                    <div class="inner">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-3.jpg" alt>
                        </div>
                        <div class="details">
                            <div class="info">
                                <h3><a href="#">Save the children</a></h3>
                                <p class="cat"> <a href="">Vew Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="content-meta">
                        <div class="skills">

                            <div class="skill">
                                <div class="progress">
                                    <div class="progress-bar" data-percent="95"></div>
                                </div>
                            </div>
                        </div>

                        <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                        <div class="meta">
                            <div class="goal">
                                <p> Goal : <span class="color-yeollo">17000$</span></p>
                            </div>
                            <div class="raised">
                                <p> Raised <span class="color-green">8000$</span></p>
                            </div>
                        </div>
                        <a href="#" class="theme-btn-s4">Donate Now</a>
                    </div>
                </div>
                <div class="grid">
                    <div class="inner">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-4.jpg" alt>
                        </div>
                        <div class="details">
                            <div class="info">
                                <h3><a href="#">Save the children</a></h3>
                                <p class="cat"> <a href="">Vew Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="content-meta">
                        <div class="skills">

                            <div class="skill">
                                <div class="progress">
                                    <div class="progress-bar" data-percent="95"></div>
                                </div>
                            </div>
                        </div>

                        <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                        <div class="meta">
                            <div class="goal">
                                <p> Goal : <span class="color-yeollo">17000$</span></p>
                            </div>
                            <div class="raised">
                                <p> Raised <span class="color-green">8000$</span></p>
                            </div>
                        </div>
                        <a href="#" class="theme-btn-s4">Donate Now</a>
                    </div>
                </div>
                <div class="grid">
                    <div class="inner">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-5.jpg" alt>
                        </div>
                        <div class="details">
                            <div class="info">
                                <h3><a href="#">Save the children</a></h3>
                                <p class="cat"> <a href="">Vew Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="content-meta">
                        <div class="skills">

                            <div class="skill">
                                <div class="progress">
                                    <div class="progress-bar" data-percent="95"></div>
                                </div>
                            </div>
                        </div>

                        <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                        <div class="meta">
                            <div class="goal">
                                <p> Goal : <span class="color-yeollo">17000$</span></p>
                            </div>
                            <div class="raised">
                                <p> Raised <span class="color-green">8000$</span></p>
                            </div>
                        </div>
                        <a href="#" class="theme-btn-s4">Donate Now</a>
                    </div>
                </div>
                <div class="grid">
                    <div class="inner">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-2.jpg" alt>
                        </div>
                        <div class="details">
                            <div class="info">
                                <h3><a href="#">Save the children</a></h3>
                                <p class="cat"> <a href="">Vew Details</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="content-meta">
                        <div class="skills">

                            <div class="skill">
                                <div class="progress">
                                    <div class="progress-bar" data-percent="95"></div>
                                </div>
                            </div>
                        </div>

                        <h3><a href="#">Supply Quality Foods To Africa's Village Area</a> </h3>
                        <div class="meta">
                            <div class="goal">
                                <p> Goal : <span class="color-yeollo">17000$</span></p>
                            </div>
                            <div class="raised">
                                <p> Raised <span class="color-green">8000$</span></p>
                            </div>
                        </div>
                        <a href="#" class="theme-btn-s4">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end recent-project-section -->

    <!-- start project-section-s2 -->
    <section class="project-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col col-lg-6 col-lg-offset-3">
                    <div class="section-title-s3">
                        <span>Recently Finished</span>
                        <h2>Featured Projects</h2>
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
                                    <a href="assets/images/portfolio/img-1.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-1.jpg" alt>
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
                            <div class="grid building commercial plants">
                                <div class="img-holder">
                                    <a href="assets/images/portfolio/img-4.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-4.jpg" alt>
                                </div>
                                <div class="details">
                                </div>
                            </div>
                            <div class="grid interior commercial">
                                <div class="img-holder">
                                    <a href="assets/images/portfolio/img-1.jpg" class="fancybox"><i class="ti-move"></i></a>
                                    <img src="assets/images/portfolio/img-1.jpg" alt>
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
{{--    <script src="{{asset('assets/js_user/page/home.js')}}"></script>--}}
@endsection

