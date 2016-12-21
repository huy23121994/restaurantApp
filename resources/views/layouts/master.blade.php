<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstraps 3.0 -->
    <link href="/css/bootstrap.v3.3.7.css" rel="stylesheet">
    <link href="/css/lib/nprogress.css" rel="stylesheet">
    @yield('add_css')

    <script src="/js/jquery.v3.1.js"></script> 
    <script src="/js/lib/turbolinks.v2.5.3.js"></script>
    <script src="/js/lib/nprogress.js"></script>
    <script src="/js/common.js" data-turbolinks-track="reload"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('add_js')
</head>
<body class="@yield('body_class')">

	@yield('main')

    @yield('custom_js')
</body>
</html>
