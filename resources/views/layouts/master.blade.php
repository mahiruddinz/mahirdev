

<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="light" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>
        
        <meta charset="utf-8" />
        <title> @yield('title') | ERP DIB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="PT Digital Indonesia Bersatu" name="description" />
        <meta content="MahirK0d3" name="author" />
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
        <!-- plugin css -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="{{ URL::asset('tester/assets/js/layout.js') }}"></script>
        <link href="{{ URL::asset('tester/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('tester/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('tester/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('tester/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('tester/assets/libs/summernote/summernote.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('tester/assets/libs/summernote/summernote.js') }}"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <!--datatable responsive css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
        <script src="https://kit.fontawesome.com/931972a100.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

        
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
                    $('#modal-title').html('');
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

    <body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ URL::asset('tester/assets/images/logo-sm.png') }}" alt="" height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('tester/assets/images/logo-dark.png') }}" alt="" height="22" />
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ URL::asset('tester/assets/images/logo-sm.png') }}" alt="" height="22" />
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('tester/assets/images/logo-light.png') }}" alt="" height="22" />
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="" />
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class="bx bx-moon fs-22"></i>
                            </button>
                        </div>
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="{{ URL::asset('tester/assets/images/users/avatar-1.jpg') }}" alt="Header Avatar" />
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ Auth::user()->role }}</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="javascript:void();"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Keluar</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('tester/assets/images/logo-sm.png') }}" alt="" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('tester/assets/images/logo-dark.png') }}" alt="" height="17" />
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('tester/assets/images/logo-sm.png') }}" alt="" height="22" />
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('tester/assets/images/logo-light.png') }}" alt="" height="17" />
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu"></div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        @if (in_array(Auth::user()->role, ['HRD','Operator']) == true)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarHumanResource" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarHumanResource">
                                <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Human Resource</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarHumanResource">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('user.index') }}" class="nav-link"> Data Karyawan </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (in_array(Auth::user()->role, ['Leader Project', 'Project', 'Marketing', 'Operator']) == true)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarProject" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProject">
                                <i class="bx bxs-user"></i> <span data-key="t-dashboards">Project</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarProject">
                                <ul class="nav nav-sm flex-column">
                                    @if (in_array(Auth::user()->role, ['Leader Project', 'Project', 'Marketing', 'Operator']) == true)
                                    <li class="nav-item">
                                        <a href="{{ route('project.index') }}" class="nav-link"> Data Project </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('task-project.index') }}" class="nav-link"> Data Tugas Project </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (in_array(Auth::user()->role, ['Marketing','Operator']) == true)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMarketing" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMarketing">
                                <i class="bx bxs-cart"></i> <span data-key="t-dashboards">Marketing</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarMarketing">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('client.index') }}" class="nav-link"> Data Klien </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (in_array(Auth::user()->role, ['GA', 'Operator']) == true)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarGeneralAffair" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGeneralAffair">
                                <i class="bx bxs-speaker"></i> <span data-key="t-dashboards">General Affair</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarGeneralAffair">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('assets.index') }}" class="nav-link"> Data Aset Kantor </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">@yield('title')</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">ERP DIB</a></li>
                                        <li class="breadcrumb-item active">@yield('title')</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            © ERP DIB.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Made with ♥ by MahirKodz
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>


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
			
		@yield('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.select2').select2();
                $('#summernote').summernote({
                    placeholder: 'Deskripsi Tugas Project',
                    tabsize: 2,
                    height: 100
                });

            });
        </script>
        <!-- JAVASCRIPT -->

        <!--datatable js-->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script src="{{ URL::asset('tester/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('tester/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('tester/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ URL::asset('tester/assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ URL::asset('tester/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('tester/assets/js/app.js') }}"></script>

    </body>

</html>
