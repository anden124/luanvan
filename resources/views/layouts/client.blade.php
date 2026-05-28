<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smobile - Hệ thống bán lẻ điện thoại chính hãng</title>
    
    <link rel="icon" href="{{ asset('assets/clients/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}">
</head>
<body>

    @include('clients.partials.header_home')

    @yield('content')

    @include('clients.partials.footer_home')

    <script src="{{ asset('assets/clients/js/jquery-1.12.1.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/clients/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/custom.js') }}"></script>
</body>
</html>