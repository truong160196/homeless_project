<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{route('user.page.home')}}" class="simple-text logo-normal">
            Homeless
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.page.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.page.auction')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Auction</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.page.donate')}}">
                    <i class="material-icons">library_books</i>
                    <p>Donate</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.page.order')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Order</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.page.user')}}">
                    <i class="material-icons">person</i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.page.history')}}">
                    <i class="material-icons">location_ons</i>
                    <p>History</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.page.setting')}}">
                    <i class="material-icons">unarchive</i>
                    <p>Setting</p>
                </a>
            </li>
        </ul>
    </div>
</div>
