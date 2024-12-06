<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>

    <link rel="shortcut icon" href="{{ asset('assets/images/logo-light.png') }}">


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css?v=2') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet"
        type="text/css">

    <link href="{{ asset('assets/libs/%40fullcalendar/core/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/%40fullcalendar/daygrid/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/%40fullcalendar/bootstrap/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/%40fullcalendar/timegrid/main.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->

    <style type="text/css">
    span.btn-outline-primary {
        height: 35px;
        width: 40px;
    }

    .form-check,
    .form-check-input,
    .form-check-label {
        font-size: 14px;
        letter-spacing: 0.3px;
    }

    .logo-lg img,
    .logo-sm img {
        filter: drop-shadow(2px 4px 6px black);
    }

    .custom-loader {
        animation: none !important;
        border-width: 0 !important;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-close-mask {
        z-index: 2099;
    }

    .select2-dropdown {
        z-index: 3051;
    }

    .vertical-align-middle td,
    .vertical-align-middle th {
        vertical-align: middle;
    }

    #imageset {
        /* border-radius: 20%; */
        text-align: left;
    }
    </style>
</head>

<body data-sidebar="dark">


    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div> -->


    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <div id="imageset">
                            <a href="#">
                                <span class="logo-sm">
                                    <img style="text-align:left" src="logo/gyan.png" alt="Paris" width="200"
                                        height="80">
                                </span>
                                <span class="logo-lg">
                                    <!-- {{-- <img src="" alt="" height="40"> --}} -->
                                </span>
                            </a>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block" style="display: none !important;">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form>


                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- <img class="rounded-circle header-profile-user"
                                src="{{Session::get('admin')->profile_picture}}" alt=""> --}}

                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            {{-- <a class="dropdown-item" href="{{route('profile')}}"><i
                                class="bx bx-user font-size-16 align-middle me-1"></i> <span
                                key="t-profile">Profile</span></a> --}}
                            {{-- <a class="dropdown-item" href="{{route('change.password')}}"><i
                                class="bx bx-lock font-size-16 align-middle me-1"></i> <span
                                key="t-change-password">Change Password</span></a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout">Logout</span></a>
                        </div>
                    </div>



                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    {{-- <img src="logo/gyan.png" alt="Paris" width="250" height="70"> --}}

                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="#" class="waves-effect">
                                <i class="bx bxs-dashboard"></i><span
                                    class="badge rounded-pill bg-info float-end"></span>
                                <span key="t-dashboards">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories.index')}}" class="waves-effect">
                                <i class="bx bx-group"></i><span class="badge rounded-pill bg-info float-end"></span>
                                {{-- <i class="bx bx-list-plus"></i><span
                                    class="badge rounded-pill bg-info float-end"></span> --}}
                                <span key="t-users">Category List</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect">
                                <i class="bx bx-group"></i><span class="badge rounded-pill bg-info float-end"></span>
                                <span key="t-users">users List</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <span class="badge rounded-pill bg-info float-end"></span>
                                <span key="t-users">Send Notification</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')
        </div>

        @yield('custom-scripts')
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>



        <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>


        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
        <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
        <script type="text/javascript">
        //  $.fn.modal.Constructor.prototype._enforceFocus = function() {};

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 200,
            "hideDuration": 1000,
            "timeOut": 3000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if(session('success'))
        toastr["success"](" {{ session('success') }}")
        @endif
        @if(session('error'))
        toastr["error"](" {{ session('error') }}")
        @endif
        @if(session('warning'))
        toastr["warning"](" {{ session('warning') }}")
        @endif
        @if(session('info'))
        toastr["info"](" {{ session('info') }}")
        @endif

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }


        function getCookie(cookieName) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [key, value] = el.split('=');
                cookie[key.trim()] = value;
            })
            return cookie[cookieName];
        }

        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        </script>
</body>

</html>