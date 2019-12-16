<!-- Start header -->
<header id="header" class="site-header header-style-1">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col col-sm-4">
                    <div class="social">
                        <ul>
                            <li>
                                <a href="{{route('admin.page.faq')}}">Faq</a>
                            </li>
                            <li><a href="{{route('admin.page.account')}}">Account</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-sm-4">
                    <div class="social center">
                        <ul>
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li><a href="#"><i class="ti-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-sm-4">
                    <div class="text">
                        <p><a href="{{route('admin.page.login')}}"><span>Login</span></a> </p>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div> <!-- end topbar -->

    <nav class="navigation navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="open-btn">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                <button class="close-navbar"><i class="ti-close"></i></button>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('admin.page.home')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('admin.page.donate.list')}}">Donate</a>
                    </li>
                    <li>
                        <a href="{{route('admin.page.auction.list')}}">Auction</a>
                    </li>
                    <li>
                        <a href="{{route('admin.page.contact')}}">Contact</a>
                    </li>
                    <li>
                        <a href="{{route('admin.page.about')}}">About</a>
                    </li>
                </ul>
            </div><!-- end of nav-collapse -->

            <div class="search-contact">
                <div class="header-search-area">
                    <div class="header-search-form">
                        <form class="form">
                            <div>
                                <input type="text" class="form-control" placeholder="Search here">
                            </div>
                            <button type="submit" class="btn"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <div>
                        <button class="btn open-btn"><i class="ti-search"></i></button>
                    </div>
                </div>
                <div class="contact">
                    <a href="{{route('admin.page.donate.list')}}" class="theme-btn">Donate Now</a>
                </div>
            </div>
            <div class="separator"></div>
        </div><!-- end of container -->
    </nav>
</header>
<!-- end of header -->
