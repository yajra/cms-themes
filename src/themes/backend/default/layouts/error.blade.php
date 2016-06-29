<!DOCTYPE html>
<html>
<head>
    {{Asset::css()}}
    <link rel="stylesheet" href="/themes/admin-lte/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/themes/admin-lte/css/skins/skin-{{config('site.admin_theme')}}.css">
    <style>
        h1 {
            font-size: 120px;
            text-align: center;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="@yield('body')">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
