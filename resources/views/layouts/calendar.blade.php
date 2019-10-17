<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>GoVista</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('content_styles1')
    <!-- Bootstrap core CSS     -->
    <link href="{{ $ruta_css_js }}assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="{{ $ruta_css_js }}assets/css/material-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ $ruta_css_js }}assets/css/demo.css" rel="stylesheet"/>
    <!--  CSS for Datepicker     -->
    <link href="{{ $ruta_css_js }}assets/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='{{ asset('css/css.css?family=Roboto:400,700,300|Material+Icons') }} rel='stylesheet'
    type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/icon.css?family=Material+Icons') }}"/>
    <!--
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    -->


    <script src="{{ asset('js/cdnjs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/cdnjs/moment.min.js') }}"></script>
    <script src="{{ asset('js/cdnjs/fullcalendar.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/cdnjs/fullcalendar.min.css') }}"/>


    <!--
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    --->
</head>

<body>

<div class="wrapper">
    @yield('content')
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{route('home')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content_body')
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>
                    Go Vista</a>
                </p>
            </div>
        </footer>
    </div>

</div>
</body>

<script src="{{ $ruta_css_js }}assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="{{ $ruta_css_js }}assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ $ruta_css_js }}assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{ $ruta_css_js }}assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="{{ $ruta_css_js }}assets/js/bootstrap-notify.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{ $ruta_css_js }}assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ $ruta_css_js }}assets/js/demo.js"></script>

<!-- Material Dashboard DatePicker !-->
<script src="{{ $ruta_css_js }}assets/js/bootstrap-datepicker.js"></script>

@yield('scripts')

</html>
