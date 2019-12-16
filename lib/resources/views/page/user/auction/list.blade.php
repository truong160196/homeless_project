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
                    <h2>Auction</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start blog-pg-section -->
    <section class="blog-pg-section blog-pg-left-sidebar service-single-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8 col-md-push-4">
                    <div class="blog-content">
                        <div class="post format-standard-image">
                            <div class="entry-media">
                                <img src="assets/images/blog/img-4.jpg" alt>
                            </div>
                            <div class="date">
                                <p>16 <span>Jul</span></p>
                            </div>
                            <h3><a href="#">We are charity, fundraising, NGO organizations. Our activities are taken place around the world.</a></h3>
                            <ul class="entry-meta">
                                <li><a href="#"><i class="ti-time"></i> 13 Oct 2019</a></li>
                                <li><a href="#"><i class="ti-book"></i> Transport, logistic</a></li>
                                <li><a href="#"><i class="ti-comment-alt"></i> 5</a></li>
                            </ul>
                            <p>Vestibulum id ligula porta felis euismod semper. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Aenean lacinia bibendum nulla sed consectetur.</p>

                            <a href="{{route('admin.page.auction.detail', ['id' => 1])}}" class="theme-btn">Bidding</a>
                        </div>
                        <div class="row mar-60">
                            <div class="col-md-6">
                                <img src="assets/images/blog/img-5.jpg" alt="image">
                            </div>
                            <div class="col-md-6">
                                <img src="assets/images/blog/img-6.jpg" alt="image">
                            </div>
                        </div>

                        <div class="service-single-content mar-60">
                            <blockquote class="">
                                <p>We are non-profit charity & NGO organization Provide help to homeless people! There are many variations of passage of Lorem Ipsum available</p>
                                <span>-Someone famous in Source Title</span>
                            </blockquote>
                            <div class="benefit clearfix">
                                <div class="details">
                                    <h3>Food help for the hunger people</h3>
                                    <ul>
                                        <li><span>1</span> 1Sponsor meals for 50 children for 1 full year.</li>
                                        <li><span>2</span> Sponsor mid-day meals for one month.</li>
                                        <li><span>3</span> You can donate clothes, blankets and ect...</li>
                                        <li><span>4</span> You can donate food material like rice, veggies.</li>
                                    </ul>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit volupt atem accusantium doloremque laudantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                                </div>
                                <div class="img-holder">
                                    <img src="assets/images/service-single/benefit-pic.jpg" alt="">
                                </div>
                            </div>

                            <div class="service-single-tab">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="#precautions" data-toggle="tab"> Docation</a>
                                    </li>
                                    <li>
                                        <a href="#intelligence" data-toggle="tab">Education</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="precautions">
                                        <img src="assets/images/service-single/img-1.jpg" alt="">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit volupt atem accusantium doloremque laudantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                                    </div>
                                    <div class="tab-pane fade" id="intelligence">
                                        <img src="assets/images/service-single/img-2.jpg" alt="">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit volupt atem accusantium doloremque laudantium. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="theme-btn-s2">Get the service</a>
                        </div>

                    </div>
                </div>
                <div class="col col-md-4 col-md-pull-8">
                    <div class="blog-sidebar">
                        <div class="widget search-widget">
                            <h3><i class="ti-location-arrow icon"></i>Search</h3>
                            <form>
                                <div>
                                    <input type="text" class="form-control" placeholder="Search Post..">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="widget about-widget">
                            <h3> <i class="ti-direction-alt icon"></i>About us</h3>
                            <div class="img-holder">
                                <img src="assets/images/blog/about-widget.jpg" alt="">
                            </div>
                            <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit.</p>
                            <a href="#">More about us</a>
                        </div>
                        <div class="widget social-widget">
                            <h3><i class="ti-cup icon"></i>Share Post</h3>
                            <div class="social-icons">
                                <ul class="">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget category-widget">
                            <h3><i class="ti-settings icon"></i>Categories</h3>
                            <ul>
                                <li><a href="#">For Education  <span>2</span></a></li>
                                <li><a href="#">For hungry clhid  <span>3</span></a></li>
                                <li><a href="#">For Homessel<span>7</span></a></li>
                                <li><a href="#">For Children  <span>5</span></a></li>
                                <li><a href="#">For Donate Now <span>10</span></a></li>
                            </ul>
                        </div>
                        <div class="widget recent-post-widget">
                            <h3><i class="ti-save-alt icon"></i>Recent post</h3>
                            <div class="posts">
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="assets/images/recent-posts/img-1.jpg" alt>
                                    </div>
                                    <div class="details">
                                        <h4><a href="{{route('admin.page.auction.detail', ['id' => 1])}}">Beautiful Day With Friends..</a></h4>
                                        <span class="date"><i class="ti-timer"></i>Oct 13 2019</span>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="assets/images/recent-posts/img-2.jpg" alt>
                                    </div>
                                    <div class="details">
                                        <h4><a href="{{route('admin.page.auction.detail', ['id' => 1])}}">Beautiful Day With Friends..</a></h4>
                                        <span class="date"><i class="ti-timer"></i>Oct 13 2019</span>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="assets/images/recent-posts/img-3.jpg" alt>
                                    </div>
                                    <div class="details">
                                        <h4><a href="{{route('admin.page.auction.detail', ['id' => 1])}}">Beautiful Day With Friends..</a></h4>
                                        <span class="date"><i class="ti-timer"></i>Oct 13 2019</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget video-widget">
                            <h3><i class="ti-video-camera icon"></i> video widget </h3>
                            <div class="img-holder">
                                <img src="assets/images/blog/video.jpg" alt="">
                                <a href="https://www.youtube.com/embed/7e90gBu4pas?autoplay=1" class="video-btn" data-type="iframe" tabindex="0"></a>
                            </div>
                            <p>Her lower arm towards the viewer. Gregor then turned to look out the indow at the dull weather.</p>
                        </div>
                        <div class="widget tag-widget">
                            <h3><i class="ti-paint-roller icon"></i>Tags</h3>
                            <ul>
                                <li><a href="#">webdesign</a></li>
                                <li><a href="#">creative</a></li>
                                <li><a href="#">html</a></li>
                                <li><a href="#">development</a></li>
                                <li><a href="#">php</a></li>
                                <li><a href="#">css</a></li>
                                <li><a href="#">template</a></li>
                                <li><a href="#">Jumla</a></li>
                            </ul>
                        </div>
                        <div class="widget instagram-widget">
                            <h3><i class="ti-instagram icon"></i>Instagram</h3>
                            <ul>
                                <li><a href="#"><img src="assets/images/add/flickr-thumb-8.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/add/flickr-thumb-7.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/add/flickr-thumb-3.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/add/flickr-thumb-4.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/add/flickr-thumb-5.png" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/add/flickr-thumb-6.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end blog-pg-section -->
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_user/page/auction.js')}}"></script>--}}
@endsection

