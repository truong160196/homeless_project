@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
{{--    <link href="{{asset('assets/css_user/page/donate.css')}}" rel="stylesheet">--}}
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
                <div class="col col-md-4">
                    <div class="recent-cases-content-outer">
                        <div class="recent-case-data active-case-data" >
                            <img src="assets/images/portfolio/img-1.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="75"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4">
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
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
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
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
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
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="recent-cases-content-outer">
                        <div class="recent-case-data active-case-data">
                            <img src="assets/images/portfolio/img-4.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="75"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end portfolio-section -->

    <!-- start portfolio-section -->
    <section class="recent-blog-section bg-w pad-b-100">
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <div class="recent-cases-content-outer">
                        <div class="recent-case-data active-case-data" >
                            <img src="assets/images/portfolio/img-5.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="75"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class=" event-slider">
                        <div class="slider">
                            <img src="assets/images/portfolio/img-4.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="55"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
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
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
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
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="recent-cases-content-outer">
                        <div class="recent-case-data active-case-data">
                            <img src="assets/images/portfolio/img-2.jpg" alt="" />
                            <div class="content-meta">
                                <div class="skills">
                                    <div class="skill">
                                        <div class="progress">
                                            <div class="progress-bar" data-percent="75"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3><a href="{{route('admin.page.donate.detail', ['id' => 1])}}">Supply Quality Foods To Africa's Village Area</a> </h3>
                                <div class="meta">
                                    <div class="goal">
                                        <p> Goal : <span class="color-yeollo">17000$</span></p>
                                    </div>
                                    <div class="raised">
                                        <p> Raised <span class="color-green">8000$</span></p>
                                    </div>
                                </div>
                                <p class="talk">We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us by your hand to be a better life</p>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s4">Donate Now</a>
                                <a href="{{route('admin.page.donate.detail', ['id' => 1])}}" class="theme-btn-s5">Read Now</a>
                            </div>
                        </div>
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

