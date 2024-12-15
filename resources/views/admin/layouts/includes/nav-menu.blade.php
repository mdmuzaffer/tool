<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">


            <div class="sidenav-menu-heading">Addons</div>
            {{-- <a class="nav-link" href="charts.html">
                <div class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
                Charts</a> --}}

                <a class="nav-link" href="{{route('admin.user.applyrecpts')}}"><div class="nav-link-icon"></div>

                   Receipts</a>
                <a class="nav-link" href="{{route('admin.user.all')}}"><div class="nav-link-icon"></div>

                    User All</a>
            <a class="nav-link" href="{{route('admin.user.create')}}"><div class="nav-link-icon"></div>
                    User Create</a>
                    <a class="nav-link" href="{{route('admin.profile')}}"><div class="nav-link-icon"></div>
                        Account Manage</a>
                        <a class="nav-link" href="{{route('admin.password')}}"><div class="nav-link-icon"></div>
                            Account Password </a>

                    <a class="nav-link" href="{{route('admin.logout')}}"><div class="nav-link-icon"></div>
                       Logout</a>


        </div>
    </div>
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            {{-- <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title">Valerie Luna</div> --}}
        </div>
    </div>
</nav>
