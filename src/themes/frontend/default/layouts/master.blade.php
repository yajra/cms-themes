<!DOCTYPE html>
<html lang="en">
<head>
    @include('system.meta')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{asset('assets/css/navigation-menu.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    @stack('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('site.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @widgetGroup('navigation')

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if(Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ currentUser()->present()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if(Widget::group('header')->any())
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">@widgetGroup('header')</div>
            </div>
        </div>
    </header>
@endif

<div class="container">
    <div class="row">
        @if(Widget::group('left')->any())
            <div class="col-md-3">@widgetGroup('left')</div>
        @endif
        @if(Widget::group('left')->any() && Widget::group('right')->any())
            <div class="col-md-6">
                @include('partials.breadcrumb')
                @yield('content')
            </div>
        @endif
        @if(Widget::group('left')->isEmpty() && Widget::group('right')->isEmpty())
            <div class="col-md-12">
                @include('partials.breadcrumb')
                @yield('content')
            </div>
        @endif
        @if(Widget::group('left')->isEmpty() && Widget::group('right')->any())
            <div class="col-md-9">
                @include('partials.breadcrumb')
                @yield('content')
            </div>
        @endif
        @if(Widget::group('left')->any() && Widget::group('right')->isEmpty())
            <div class="col-md-9">
                @include('partials.breadcrumb')
                @yield('content')
            </div>
        @endif
        @if(Widget::group('right')->any())
            <div class="col-md-3">@widgetGroup('right')</div>
        @endif
    </div>
</div>

@if(Widget::group('footer')->any())
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">@widgetGroup('footer')</div>
            </div>
        </div>
    </header>
@endif
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

@stack('scripts')
</body>
</html>
