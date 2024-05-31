<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> قالب مدیریتی </title>
    <link rel="shortcut icon" href="assets/media/image/favicon.png">
    <meta name="theme-color" content="#5867dd">
    <link rel="stylesheet" href="{{ asset('panel/vendors/bundle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('panel/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendors/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendors/vmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/assets/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('panel/plugins/sweet_alert/sweetalert2.min.css') }}">
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        img.hoverImage:hover {
            width: 30px;
            height: 30px !important;
            position: relative;
            z-index: 99999
        }

        img.hoverImage:hover {
            width: 150px;
            height: 150px !important;
        }
    </style>
    @livewireStyles
</head>

<body class="small-navigation">
    @include('admin.layouts.navigation')
    @include('admin.layouts.header')

    <main class="main-content">

        {{ $slot }}

    </main>

    <script src="{{ asset('panel/vendors/bundle.js') }}"></script>
    <script src="{{ asset('panel/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/vmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('panel/assets/js/app.js') }}"></script>
    <script src="{{ asset('panel/plugins/sweet_alert/sweetalert2.all.min.js') }}"></script>

    @livewireScripts
</body>

</html>
