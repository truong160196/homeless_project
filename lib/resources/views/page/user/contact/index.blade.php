@extends('layout_user.main')

@section('page_title')
    Home
@endsection

@section('css')
{{--    <link href="{{asset('assets/css_user/page/contact.css')}}" rel="stylesheet">--}}
@endsection

@section('page_content')


    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2>Contact</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <!-- start contact-pg-section -->
    <section class="contact-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8 col-md-offset-2">
                    <div class="section-title-s3">
                        <span>Contact us</span>
                        <h2>Drop us a line</h2>
                        <p>Outlines modern global logistics and the value of air, ocean, and ground freight. Logistics in the United States accounted  logistics is spent</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="contact-info clearfix">
                        <div>
                            <div class="icon">
                                <i class="ti-email"></i>
                            </div>
                            <h5>Email</h5>
                            <p>demo@example.com</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <h5>Phone</h5>
                            <p>+11000854564145474</p>
                        </div>
                        <div>
                            <div class="icon">
                                <i class="ti-target"></i>
                            </div>
                            <h5>Address</h5>
                            <p>USA 27TH Brooklyn NY</p>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form method="post" class="contact-validation-active" id="contact-form-main">
                            <div class="one-third-col">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                            </div>
                            <div class="one-third-col">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                            </div>
                            <div class="one-third-col">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone">
                            </div>
                            <div>
                                <textarea class="form-control" name="note"  id="note" placeholder="Case Description..."></textarea>
                            </div>
                            <div class="submit-btn-wrapper">
                                <button type="submit" class="theme-btn-s2">Submit now</button>
                                <div id="loader">
                                    <i class="ti-reload"></i>
                                </div>
                            </div>
                            <div class="clearfix error-handling-messages">
                                <div id="success">Thank you</div>
                                <div id="error"> Error occurred while sending email. Please try again later. </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact-pg-section -->
@endsection

@section('js')
{{--    <script src="{{asset('assets/js_user/page/contact.js')}}"></script>--}}
@endsection

