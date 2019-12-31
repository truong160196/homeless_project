<section class="header">
    <div class="company-name">
        <a href="{{route('user.page.home')}}" class="">
            <h3>Homeless Fund</h3>
        </a>
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
                            @if(auth()->user())
                                <h5>{{auth()->user()->username}}</h5>
                                <p>{{auth()->user()->full_name}}</p>
                            @endif
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>
