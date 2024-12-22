<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('assets/libs/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="{{ asset('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    @livewireStyles
    @yield('style')
    <style>
        .header-title {
            text-align: right;
        }

        

   /* General Sidebar Styling */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    height: 100vh;
    padding: 0; /* Remove padding inside the sidebar */
    color: #ecf0f1;
    font-family: Arial, sans-serif;
    overflow-y: auto; /* Ensure the content scrolls if it overflows */
}

.menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.menu-item {
    position: relative;
}

.menu-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #ecf0f1;
    text-decoration: none;
    padding: 10px; /* Minimal padding */
    border-bottom: 1px solid #34495e; /* Optional for separation */
    transition: background 0.3s;
}

.menu-link:hover {
    background-color: #34495e;
}

/* Submenu Styling */
.submenu {
    max-height: 0; /* Collapsed by default */
    overflow: hidden; /* Hide content when collapsed */
    list-style: none;
    padding: 0;
    margin: 0;
    background-color: #34495e;
    transition: max-height 0.3s ease-out; /* Smooth expand/collapse */
}

.submenu li {
    border-bottom: 1px solid #2c3e50;
}

.submenu li:last-child {
    border-bottom: none;
}

.submenu li a {
    display: block;
    color: #ecf0f1;
    text-decoration: none;
    padding: 10px;
    transition: background 0.3s;
}

.submenu li a:hover {
    background-color: #1abc9c;
}

/* Show Submenu on Hover */
.menu-item:hover > .submenu {
    max-height: 200px; /* Adjust height based on content */
}

/* Remove Left Space */
.menu-link,
.submenu li a {
    padding-left: 10px; /* Adjust for minimal space */
}

/* Add a left border if needed */
.sidebar {
    border-left: 2px solid #1abc9c; /* Optional border for visual alignment */
}


</style>


    @livewireStyles
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
                    <!-- <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="lang-image" height="12">
                        </a> -->
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany.jpg" alt="lang-image" class="mr-1" height="12"> <span
                                    class="align-middle">German</span>
                            </a> -->


                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="badge badge-pink rounded-circle noti-icon-badge">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow m-0"><span class="float-right">
                                    <span class="badge badge-danger float-right">0</span>
                                </span>Notification</h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                    <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a> -->

                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);"
                            class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class="fe-log-out"></i>
                                {{ __('Logout') }}
                            </a>
                        </form>

                    </div>
                </li>

                <!-- <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li> -->


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ Route('dashboard') }}" class="logo text-center">
                    <span class="logo-lg">
                        <h4 class="text-white mt-4">Hussaini Emporium</h4>
                        <!-- <img src="{{ asset('assets/images/logo.jpeg') }}" alt="" width="100%" height="100"> -->
                        <!-- <span class="logo-lg-text-light">UBold</span> -->
                    </span>
                    <span class="logo-sm p-1">
                        <!-- <span class="logo-sm-text-dark">U</span> -->
                        <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="28"> -->
                        <img src="{{ asset('frontend/img/logo.png') }}" alt="" width="100%"
                            height="60">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu pt-4">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="menu">
                        <li>
                            <a href="{{ Route('dashboard') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link">
                                <i class="fe-airplay"></i>
                                <span>Category</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ Route('admin.category.index') }}">Category</a></li>
                                <li><a href="{{ Route('admin.sub_category.index') }}">
                                Sub Category</a></li>
                                <li><a href="{{ Route('admin.child_category.index') }}">
                                Child Category</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ Route('admin.product.index') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Product</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ Route('admin.order.index') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>All Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.pendingOrders') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Pending Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.processingOrders') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Processing Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.shippedOrders') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Shipped Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.deliveredOrders') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Delivered Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.canceledOrders') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Canceled Orders</span>
                            </a>
                        </li>


                        <!-- <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link">
                                <i class="fe-airplay"></i>
                                <span>Orders</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ Route('admin.order.index') }}">All Orders</a></li>
                                <li><a href="{{ Route('admin.pendingOrders') }}">Pending Orders</a></li>
                                <li><a href="{{ Route('admin.processingOrders') }}">Processing Orders</a></li>
                                <li><a href="{{ Route('admin.shippedOrders') }}">Shipped Orders</a></li>
                                <li><a href="{{ Route('admin.deliveredOrders') }}">
                                Delivered Orders</a></li>
                            </ul>
                        </li> -->

                        <!-- <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link">
                                <i class="fe-airplay"></i>
                                <span>Reports</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ Route('admin.order.index') }}">Products Report</a></li>
                                <li><a href="{{ Route('admin.pendingOrders') }}">Pending Orders</a></li>
                                <li><a href="{{ Route('admin.processingOrders') }}">Processing Orders</a></li>
                                <li><a href="{{ Route('admin.shippedOrders') }}">Shipped Orders</a></li>
                                <li><a href="{{ Route('admin.deliveredOrders') }}">
                                Delivered Orders</a></li>
                            </ul>
                        </li> -->

                        <li>
                            <a href="{{ Route('admin.customer.index') }}" wire:loading.attr="disabled">
                                <i class="fe-airplay"></i>
                                <span>Customer</span>
                            </a>
                        </li>

                        @can('user-access')
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="submenu">
                                @can('user-access')
                                <li><a href="{{ Route('admin.users.index') }}">Manage Users</a></li>
                                @endcan
                                @can('role-access')
                                <li><a href="{{ Route('admin.roles.index') }}">Roles</a></li>
                                @endcan
                                @can('permission-access')
                                <li><a href="{{ Route('admin.permissions.index') }}">Permissions</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        @yield('content')



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        &copy; 2023 - Developed by <a href="https://orasoft.pk">OraSoft.pk</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <!-- <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/light.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/dark.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="{{ asset('assets/css/bootstrap-dark.min.css') }}" data-appStyle="{{ asset('assets/css/app-dark.min.css') }}" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/rtl.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/dark-rtl.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark-rtl.min.css" />
                    <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>

                <a href="https://1.envato.market/y2YAD" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
            </div>
        </div>
    </div> -->
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a> -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>

    @livewireScripts
    @yield('script')
    

    @if ($message = Session::get('success'))
        <script>
            window.addEventListener('refresh-page', event => {
                window.location.reload(false);
            });

            window.addEventListener('swal:modal', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                });
            });

            window.addEventListener('swal:confirm', event => {
                swal({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.type,
                        button: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.livewire.emit('delete', event.detail.id);
                        }
                    });
            });



            $.toast({
                heading: "Well done!",
                text: "{!! $message !!}",
                position: "top-right",
                loaderBg: "#5ba035",
                icon: "success",
                hideAfter: 3e3,
                stack: 1
            })
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script>
            $.toast({
                heading: "Oh snap!",
                text: "{!! $message !!}",
                position: "top-right",
                loaderBg: "#bf441d",
                icon: "error",
                hideAfter: 3e3,
                stack: 1
            })
        </script>
    @endif
</body>

</html>
