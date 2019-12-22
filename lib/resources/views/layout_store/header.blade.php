<section class="header">
    <div class="company-name">
        <h3>STORE</h3>
    </div>
    <div class="right-header">
        <ul>
            <li title="store">
                <a href="{{route('store.page.home')}}" class="">
                    <i class="fas fa-store"></i>
                    <span>Store</span>
                </a>
            </li>
            <li title="dashboard">
                <a href="{{route('store.page.dashboard')}}" class="">
                    <i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li title="Account">
                <a href="{{route('store.page.account')}}" class="btn btn-light select-user" type="button" id="btn-user">
                    <div class="account">
                        <div class="avatar">
                            <img src="{{asset('assets/images/user.png')}}" />
                        </div>
                        <div class="info-user">
                            <h5>truong160196</h5>
                            <p>Store Owner</p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>
