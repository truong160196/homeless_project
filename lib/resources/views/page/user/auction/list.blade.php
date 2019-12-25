@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
    <link href="{{asset('assets/css_user/page/auction.css')}}" rel="stylesheet">
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

                        @foreach ($auctions as $auction)
                            <div class="service-single-content">
                                <div class="benefit clearfix">
                                    <div class="date">
                                        <p>{{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_start_time)->format('d')}}
                                            <span>
                                                {{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_start_time)->format('M')}}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="details">
                                        <h3>{{$auction->auction_title}}</h3>

                                        <ul class="entry-meta">
                                            <li><a href="#"><i class="ti-time"></i> 
                                                {{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_start_time)->format('H\h i\'')}}
                                                -
                                                {{DateTime::createFromFormat("Y-m-d H:i:s", $auction->auction_end_time)->format('H\h i\'')}}
                                            </a></li>
                                            <li><a href="#"><i class="ti-book"></i> Transport, logistic</a></li>
                                            <li><a href="#"><i class="ti-comment-alt"></i> 5</a></li>
                                        </ul>

                                        <p>{{$auction->auction_detail}}</p>
                                    </div>
                                    <div class="img-holder">
                                        <img src="{{asset($auction->product_image)}}" alt="">
                                    </div>
                                </div>
                                <a href="{{route('user.page.auction.detail', ['id' => $auction->id])}}" class="theme-btn-s2">Bidding</a>
                            </div>
                        @endforeach

                        <section class="recent-blog-section bg-w section-page">
                            {{ $auctions->links() }}
                        </section>
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

                        <div class="widget category-widget">
                            <h3><i class="ti-settings icon"></i>Categories</h3>
                            <ul>
                                @foreach($categories as $category)
                                    <li>{{$category->category_name}}  <span>{{$category->id}}</span></li>
                                @endforeach
                            </ul>
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

                        <div class="widget about-widget">
                            <h3> <i class="ti-direction-alt icon"></i>About us</h3>
                            <div class="img-holder">
                                <img src="assets/images/blog/about-widget.jpg" alt="">
                            </div>
                            <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit.</p>
                            <a href="#">More about us</a>
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

