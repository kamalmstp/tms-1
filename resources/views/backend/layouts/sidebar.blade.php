<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="index.html">
                        <i class="fa fa-bus text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">Transportation </span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{ asset('asset/backend_asset/assets/media/avatars/avatar15.jpg')}}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="be_pages_generic_profile.html">
                    <img class="img-avatar" src="{{ asset('asset/backend_asset/assets/media/avatars/avatar15.jpg')}}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="be_pages_generic_profile.html">{{Auth::user()->name}}</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="/admin"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">I.M</span><span class="sidebar-mini-hidden">Income Module</span></li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Bus</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Bus</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Bus List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Collection Point</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Collection Point</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Collection Point List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Ammounts</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Ammounts</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Ammounts List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Trip</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Trip</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Trip List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Cash Collection</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Cash Collection</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Cash Collection List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">I.M</span><span class="sidebar-mini-hidden">Expense Module</span></li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Zone</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Zone</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Zone List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Expense Categories</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Expense Categories</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Expense Categories List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Police Payment Main Sector</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Police Payment Main Sector</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Police Payment Main Sector List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Police Payment Sub Sector</span></a>
                    <ul>
                        <li>
                            <a href="be_blocks.html">Add Police Payment Sub Sector</a>
                        </li>
                        <li>
                            <a href="be_blocks_draggable.html">Police Payment Sub Sector List</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
