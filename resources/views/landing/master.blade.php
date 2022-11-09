<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PT Digital Indonesia Bersatu</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('landing/assets/images/favicon.svg') }}" />


    @include('landing.component.header-script')
</head>

<body>
    @include('landing.component.header')


    @yield('content')


    @include('landing.component.footer')


    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    @include('landing.component.footer-script')
</body>


</html>