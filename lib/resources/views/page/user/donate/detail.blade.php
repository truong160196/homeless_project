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
                    <h2>{{ $donate->donate_title }}</h2>
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
                    <div class="recent-cases-content-outer">
                        <div class="recent-case-data active-case-data" >
                            <div class="row">
                                <div class="col col-xs-12">
                                    <img src="{{ asset($donate->donate_image) }}" alt="" />
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
                                                <p> Goal : <span class="color-yeollo">{{number_format($donate->donate_raised)}}$</span></p>
                                            </div>
                                            <div class="raised">
                                                <p> Raised <span class="color-green">{{number_format($donate->donate_goal)}}$</span></p>
                                            </div>
                                        </div>
                                        <p class="talk">{{$donate->donate_detail}}</p>
                                        {!! $donate->donate_content !!}
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
                                        
                                        <a href="{{route('user.page.donate.donate', ['id' => $donate->id])}}" class="theme-btn-s4">Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4">
                    <div class="image-detail">
                        <img src="/{{$donate->donate_image}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end portfolio-section -->
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_user/page/donate.js')}}"></script>--}}
@endsection

