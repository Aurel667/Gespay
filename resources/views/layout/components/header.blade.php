
<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <div class="navbar-header" data-logobg="skin6">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <a class="navbar-brand" href="index.html">
            <!-- Logo icon -->
            <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
                <!-- dark Logo text -->
                <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
            </span>
        </a>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                class="ti-menu ti-close"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-start me-auto">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                    href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                <form class="app-search position-absolute">
                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                        class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                </form>
            </li>
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-end d-flex align-content-center pt-3">
            <li>
                <p class="h4 text-secondary"> {{Auth::user()->name}} {{Auth::user()->surname}} : <span class="fw-bold text-dark">{{Auth::user()->role}}</span> </p>
            </li>
        </ul>
    </div>
</nav>
