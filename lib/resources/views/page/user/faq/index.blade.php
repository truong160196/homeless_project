@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
{{--    <link href="{{asset('assets/css_user/page/faq.css')}}" rel="stylesheet">--}}
@endsection

@section('page_content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>FAQ</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start faq-pg-section -->
    <section class="faq-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <div class="section-title-s3">
                        <h2>Frequently asked question</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true">What is the process to be a part of humanity?</a>
                            </div>
                            <div id="collapse-1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us small batch freegan sed. Craft beer elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2">What types of project work can I request?</a>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us small batch freegan sed. Craft beer elit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3">What information do I need for the humanity application?</a>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us small batch freegan sed. Craft beer elit.</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3">What information do I need for the humanity?</a>
                            </div>
                            <div id="collapse-4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us small batch freegan sed. Craft beer elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end faq-pg-section -->
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_user/page/faq.js')}}"></script>--}}
@endsection

