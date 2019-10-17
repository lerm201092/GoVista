<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | GoVista App</title>


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css" rel="stylesheet') }} "/>
    <!--  CSS for Datepicker     -->
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen"/>

    <!--     Fonts and icons   -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css.css?family=Roboto:400,700,300|Material+Icons') }}" rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/icon.css?family=Material+Icons') }}"/>
    <script src="{{ asset('assets/js/jquery-3.1.0.min.js') }}" type="text/javascript"></script>


    <link rel="stylesheet" href="{{ asset('exercises/exercise_1/TemplateData/style.css') }}">
    <script src="{{ asset('exercises/exercise_1/TemplateData/UnityProgress.js') }}"></script>
    <script src="{{ asset('exercises/exercise_1/Build/UnityLoader.js') }}"></script>

    @yield('content_styles2')

    <script>
        function SaveData(id, id_history, duration, Failure, Progress, status_game, coins, stars)//metodo llamado por el juego para guardar los datos
        {
            window.alert(id + " " + id_history + " " + duration + " " + Failure + " " + Progress + " " + status_game + " " + coins + " " + stars)
        }

        function ForceSave() {//intento de que al jugador cerrar el navegador primero guarde los datos de juego, no estoy seguro de si esta funcionando correctamten igual es opcional
            gameInstance.SendMessage('MinigameHUD','ForceSave');
        }

        window.onbeforeunload = function() {//funciona con el metodo de arriba
            ForceSave();
            return "asd";
        }
    </script>
</head>
<body>
<div class="webgl-content">
    <div id="gameContainer" style="width: 960px; height: 600px"></div>
    <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">GoVista App</div>
    </div>
</div>
</body>

<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/material.min.js') }}" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js') }}" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}" type="text/javascript"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{ asset('assets/js/material-dashboard.js') }}" type="text/javascript"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/js/demo.js') }}" type="text/javascript"></script>

<!-- Select2 !-->
<script src="{{asset('assets/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/i18n/es.js') }}" type="text/javascript"></script>

<!-- Material Dashboard DatePicker !-->
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.es.js') }}" type="text/javascript"></script>

</html>
