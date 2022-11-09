
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8" />
        <title> @yield('title') | ERP DIB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PT Digital Indonesia Bersatu" name="description" />
        <meta content="MahirK0d3" name="author" />
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
        <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <link href="{{ URL::asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />     
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <script src="https://kit.fontawesome.com/931972a100.js" crossorigin="anonymous"></script>

        <script type="text/javascript">
            function modal_open(type, url) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#modal').modal('show');
                if (type == 'add') {
                    $('#modal-title').html('<i class="fa fa-plus"></i> Tambah Data');
                } else if (type == 'edit') {
                    $('#modal-title').html('<i class="fa fa-edit"></i> Ubah Data');
                } else if (type == 'detail') {
                    $('#modal-title').html('<i class="fa fa-search"></i> Detail Data');
                } else if (type == 'delete') {
                    $('#modal-title').html('<i class="fa fa-trash"></i> Hapus Data');
                } else {
                    $('#modal-title').html(type);
                }
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "html",
                    beforeSuccess: function() {
                        $('#body-result').html('<div class="progress progress-striped active"><div style="width: 100%" class="progress-bar progress-bar-primary"></div></div>');
                    },
                    success: function($data) {
                        $('#modal-result').html($data);
                    }, error: function() {
                        $('#modal-result').html('<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Terjadi kesalahan!</div>');
                    }
                });
            }
        </script>
    </head>

    <body data-sidebar="colored" data-topbar="light" data-layout-mode="dark">

        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo.svg') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-light.svg') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                                <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="javascript:void();"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
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
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

							@if (in_array(Auth::user()->role, ['Marketing','Operator']) == true)
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="">Karyawan</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('user.index') }}">Data Karyawan</a></li>
                                </ul>
                            </li>
							@endif

							@if (in_array(Auth::user()->role, ['Marketing', 'Leader Project', 'Operator']) == true)
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-joystick-button"></i>
                                    <span key="">Project</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('project.index') }}">Data Project</a></li>
                                </ul>
                            </li>
							@endif

							@if (in_array(Auth::user()->role, ['Marketing', 'Operator']) == true)
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store-alt"></i>
                                    <span key="">Marketing</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('client.index') }}">Data Klien</a></li>
                                </ul>
                            </li>
							@endif

                            @if (in_array(Auth::user()->role, ['GA', 'Operator']) == true)
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-server"></i>
                                    <span key="">General Affair</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('assets.index') }}">Data Barang</a></li>
                                </ul>
                            </li>
							@endif

                            @if (in_array(Auth::user()->role, ['Project', 'Operator']) == true)
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-joystick-button"></i>
                                    <span key="">User Project</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('task-project.index') }}">Data Tugas Project</a></li>
                                </ul>
                            </li>
							@endif

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

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © PT Digital Indonesia Bersatu.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by MahirKode with ❤
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <div id="modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>   
                    </div>
                    <div class="modal-body" id="modal-result">
                    </div>
                </div>
            </div>
        </div>
			
		<script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
		@yield('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2();
                $('.datepicker').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'yyyy-mm-dd'
                });

            });
        </script>
        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/app.js') }}"></script>

    </body>

</html>
