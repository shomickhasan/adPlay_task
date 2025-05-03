<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('ftitle')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}image/favicon.png">
    <meta name="facebook-domain-verification" content="s2fr0hvguln7dhbbhloy9tdlvqb9k1" />
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/preloader.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/slick.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/metisMenu.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/default.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/style.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/toastr/toastr.css" />
    <style>
        .add_to_cart{
            cursor: pointer;
        }
        .toast-success {
            background-color: #141514 !important;  /* Black Success Color */
            color: #ffffff !important;
        }

        .custom-breadcrumb {
            background-color: #d3d3d3; /* gray background */
            padding: 3px 4px;
            font-size: 11px;
            border-radius: 3px;
            display: inline-block; /* Make width fit content */
        }
        .custom-breadcrumb a {
            text-decoration: none;
            color: #a0a0a0; /* light gray text */
        }
        .custom-breadcrumb span {
            color: #a0a0a0;
        }
        .custom-breadcrumb .separator::after {
            content: ' > ';
            color: #a0a0a0;
            padding: 0 5px;
        }
        .custom-breadcrumb .separator:last-child::after {
            content: '';
        }
        .custom-breadcrumb .active{
            color: #0B0B0B;
        }

        h2.large_p_text {
            font-size: 23px;
            /* text-decoration: none; */
            text-transform: capitalize;
            font-weight: 700;
        }



    </style>
</head>
@stack('css')
