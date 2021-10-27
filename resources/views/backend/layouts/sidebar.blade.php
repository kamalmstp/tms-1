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
                    <a class="link-effect font-w700" href="/">
                        <span class="font-size-xl text-dual-primary-dark">Transportation</span>
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
                <a class="img-link" type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                    <img class="img-avatar" src="{{ asset('asset/backend_asset/assets/media/favicons/bus.svg')}}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">{{Auth::user()->name}}</a>
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
                    <a href="/"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">S.L</span><span class="sidebar-mini-hidden">Staff List</span></li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-bars"></i><span class="sidebar-mini-hide">User Type</span></a>
                    <ul>
                        <li>
                            <a href="{{route('user-type.create')}}">Add User Type</a>
                        </li>
                        <li>
                            <a href="{{route('user-type.list')}}">User Type List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Add User</span></a>
                    <ul>
                        <li>
                            <a href="{{route('user.create')}}">Add User</a>
                        </li>
                        <li>
                            <a href="{{route('user.list')}}">User List</a>
                        </li>
                    </ul>
                </li>


                <li class="nav-main-heading"><span class="sidebar-mini-visible">I.M</span><span class="sidebar-mini-hidden">Income Module</span></li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-bus"></i><span class="sidebar-mini-hide">Bus</span></a>
                    <ul>
                        <li>
                            <a href="{{route('bus.create')}}">Add Bus</a>
                        </li>
                        <li>
                            <a href="{{route('bus.list')}}">Bus List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-bookmark"></i><span class="sidebar-mini-hide">Collection Point</span></a>
                    <ul>
                        <li>
                            <a href="{{route('collection-point.create')}}">Add Collection Point</a>
                        </li>
                        <li>
                            <a href="{{route('collection-point.list')}}">Collection Point List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-money"></i><span class="sidebar-mini-hide">Ammounts</span></a>
                    <ul>
                        <li>
                            <a href="{{route('ammount.create')}}">Add Ammounts</a>
                        </li>
                        <li>
                            <a href="{{route('ammount.list')}}">Ammounts List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-mouse-pointer"></i><span class="sidebar-mini-hide">Trip</span></a>
                    <ul>
                        <li>
                            <a href="{{route('trip.create')}}">Add Trip</a>
                        </li>
                        <li>
                            <a href="{{route('trip.list')}}">Trip List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-handshake-o"></i><span class="sidebar-mini-hide">Cash Collection</span></a>
                    <ul>
                        <li>
                            <a href="{{route('cash-collection.create')}}">Add Cash Collection</a>
                        </li>
                        <li>
                            <a href="{{route('cash-collection.list')}}">Cash Collection List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-money"></i><span class="sidebar-mini-hide">Total Cash</span></a>
                    <ul>
                        <li>
                            <a href="{{route('adjust-collection.create')}}">Daily Cash Calculate</a>
                        </li>
                        <li>
                            <a href="{{route('adjust-collection.list')}}">Daily Cash Calculate List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">E.M</span><span class="sidebar-mini-hidden">Expense Module</span></li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-search-plus"></i><span class="sidebar-mini-hide">Zone</span></a>
                    <ul>
                        <li>
                            <a href="{{route('zone.create')}}">Add Zone</a>
                        </li>
                        <li>
                            <a href="{{route('zone.list')}}">Zone List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('expense-category.list')}}"><i class="fa fa-list-ul"></i><span class="sidebar-mini-hide">Expense Categories List</span></a>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-outdent"></i><span class="sidebar-mini-hide">Police Payment Main Sector</span></a>
                    <ul>
                        <li>
                            <a href="{{route('ppmain.create')}}">Add Police Payment Main Sector</a>
                        </li>
                        <li>
                            <a href="{{route('ppmain.list')}}">Police Payment Main Sector List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-outdent"></i><span class="sidebar-mini-hide">Police Payment Sub Sector</span></a>
                    <ul>
                        <li>
                            <a href="{{route('ppsub.create')}}">Add Police Payment Sub Sector</a>
                        </li>
                        <li>
                            <a href="{{route('ppsub.list')}}">Police Payment Sub Sector List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript::void(0)"><i class="fa fa-american-sign-language-interpreting"></i><span class="sidebar-mini-hide">Expense</span></a>
                    <ul>
                        <li>
                            <a href="{{route('expense.create')}}">Add Expense</a>
                        </li>
                        <li>
                            <a href="{{route('expense.list')}}">Expense List</a>
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
