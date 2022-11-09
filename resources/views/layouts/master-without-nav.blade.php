
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="horizontal" data-layout-style="" data-layout-position="fixed"  data-topbar="light">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="ERP DIB mantap jiwa!">
    <meta name="author" content="MahirKode">
    <title> ERP DIB</title>
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body>
       @yield('content')
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/node-waves/waves.min.js') }}"></script>
        
        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    </body>

</html>