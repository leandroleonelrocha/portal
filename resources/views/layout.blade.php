<!DOCTYPE html>

<html lang="en">

    <head>

        <base href="{{ asset('') }}">
        <meta charset="utf-8">
        <base href="{{ asset('') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="https://portal.mds.gob.ar/img/favicon.ico" />
        <title>Nuevo Portal</title>
        @yield('head')

        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}">
        @yield('css-pre-theme')
        <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/theme/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/_all-skins.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">

        @yield('css')

    </head>

    <body class="@yield('body-class', '')">

        @yield('body')

        <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
        <script src="{{ asset('js/theme/app.min.js') }}"></script>
        <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/i18n/es.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        @yield('js')

    </body>

</html>