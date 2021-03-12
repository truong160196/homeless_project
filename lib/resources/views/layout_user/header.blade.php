<!-- Start header -->
<header id="header" class="site-header header-style-1">
    <nav class="navigation navbar navbar-default original sticky-on">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="open-btn">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('user.page.home')}}"><img src="{{asset('assets/images/logo.png')}}" alt></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                <button class="close-navbar"><i class="ti-close"></i></button>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('user.page.home')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('user.page.donate.list')}}">Donate</a>
                    </li>
                    <li>
                        <a href="{{route('user.page.auction.list')}}">Auction</a>
                    </li>
                    <li>
                        <a href="{{route('user.page.contact')}}">Contact</a>
                    </li>
                    <li>
                        <a href="{{route('user.page.about')}}">About</a>
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
                    @if(Auth()->user())
                        <a href="{{route('account.page.login')}}" class="theme-btn">{{Auth()->user()->username}}</a>
                    @else
                        <a href="{{route('account.page.login')}}" class="theme-btn"><span>Login</span></a>
                    @endif
                </div>
            </div>
            <div class="separator"></div>
        </div><!-- end of container -->
    </nav>
</header>
<!-- end of header -->
