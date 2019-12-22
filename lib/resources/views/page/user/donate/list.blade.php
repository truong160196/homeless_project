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
                    <h2>Donate</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start portfolio-section -->
    <section class="recent-blog-section section-padding bg-w">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 3 && $i < count($donates); $i++)
                    <div class="col col-md-4">
                        <div class="recent-cases-content-outer">
                            <div class="recent-case-data active-case-data" >
                                <img src="{{asset($donates[$i]->donate_image)}}" alt="" />
                                <div class="content-meta">
                                    <div class="skills">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="progress-bar" data-percent="{{ number_format($donates[$i]->donate_raised / $donates[$i]->donate_goal * 100, 2) }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="{{route('user.page.donate.detail', ['id' => $donates[$i]->id])}}">{{$donates[$i]->donate_title}}</a> </h3>
                                    <div class="meta">
                                        <div class="goal">
                                            <p> Goal : <span class="color-yeollo">{{number_format($donates[$i]->donate_raised)}}$</span></p>
                                        </div>
                                        <div class="raised">
                                            <p> Raised <span class="color-green">{{number_format($donates[$i]->donate_goal)}}$</span></p>
                                        </div>
                                    </div>
                                    <p class="talk">{{$donates[$i]->donate_detail}}</p>
                                    <a href="{{route('user.page.donate.donate', ['id' => $donates[$i]->id])}}" class="theme-btn-s4">Donate Now</a>
                                    <a href="{{route('user.page.donate.detail', ['id' => $donates[$i]->id])}}" class="theme-btn-s5">Read Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end portfolio-section -->

    <!-- start portfolio-section -->
    <section class="recent-blog-section bg-w">
        <div class="container">
            <div class="row">
            @for ($i = 3; $i < count($donates); $i++)
                    <div class="col col-md-4">
                        <div class="recent-cases-content-outer">
                            <div class="recent-case-data active-case-data" >
                                <img src="{{$donates[$i]->image}}" alt="" />
                                <div class="content-meta">
                                    <div class="skills">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="progress-bar" data-percent="{{ number_format($donates[$i]->donate_raised / $donates[$i]->donate_goal * 100, 2) }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><a href="{{route('user.page.donate.detail', ['id' => $donates[$i]->id])}}">{{$donates[$i]->donate_title}}</a> </h3>
                                    <div class="meta">
                                        <div class="goal">
                                            <p> Goal : <span class="color-yeollo">{{number_format($donates[$i]->donate_raised)}}$</span></p>
                                        </div>
                                        <div class="raised">
                                            <p> Raised <span class="color-green">{{number_format($donates[$i]->donate_goal)}}$</span></p>
                                        </div>
                                    </div>
                                    <p class="talk">{{$donates[$i]->donate_detail}}</p>
                                    <a href="{{route('user.page.donate.donate', ['id' => $donates[$i]->id])}}" class="theme-btn-s4">Donate Now</a>
                                    <a href="{{route('user.page.donate.detail', ['id' => $donates[$i]->id])}}" class="theme-btn-s5">Read Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end portfolio-section -->

    <section class="recent-blog-section bg-w section-page">
        {{ $donates->links() }}
    </section>
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_user/page/donate.js')}}"></script>--}}
@endsection

