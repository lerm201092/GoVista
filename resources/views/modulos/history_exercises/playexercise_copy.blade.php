@extends('layouts.admon')

@section('content_styles1')
    <link rel="shortcut icon" href="{{ asset('assets/exercises/exercise_'.$exercise.'/TemplateData/favicon.ico') }} ">
    <link rel="stylesheet" href="{{ asset('assets/exercises/exercise_'.$exercise.'/TemplateData/style.css') }}">
    <script src="{{ asset('assets/exercises/exercise_'.$exercise.'/TemplateData/UnityProgress.js') }}"></script>
    <script src="{{ asset('assets/exercises/exercise_'.$exercise.'/Build/UnityLoader.js') }}"></script>
    <script>
        var gameInstance = UnityLoader.instantiate("gameContainer", "{{ asset('assets/exercises/exercise_'.$exercise.'/Build/GoVistaWeb.json') }}", {onProgress: UnityProgress});

        //TIEMPO
        function Duration(tiempo) {
            gameInstance.SendMessage('estado', 'Duration', tiempo);
        }

        //ID
        function ID(id) {
            gameInstance.SendMessage('estado', 'ID_', id);
        }

        //ID_HISTORY
        function ID_His(id_h) {
            gameInstance.SendMessage('estado', 'ID_H', id_h);
        }

        //DIFICULTAD
        function Difi(d) {
            gameInstance.SendMessage('estado', 'difi', d);
        }

        //OJO IZQUIERDO
        function EyeL(left) {
            gameInstance.SendMessage('estado', 'eyeL', left);
        }

        //OJO DERECHO
        function EyeR(right) {
            gameInstance.SendMessage('estado', 'eyeR', right);
        }

        //STATUS
        function Status(st) {
            gameInstance.SendMessage('estado', 'Stat', st);
        }

        //URL Respuesta
        function url(link) {
            gameInstance.SendMessage('estado', 'LinkRespuesta', link);
        }

    </script>

@endsection

<!-- SideBar -->
@section('content')
    @include ('bar.sidebarmedico')
@endsection

@section('content_body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Ejercicio</h4>
                        <p class="category">Número 1</p>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">
                                    <a href="{{ url('/modulos/history_exercises') }}" title="Back">
                                        <button type="button" rel="tooltip" title="Regresar"
                                                class="btn btn-warning btn-round btn-just-icon">
                                            <i class="material-icons">arrow_back</i>
                                        </button>
                                    </a>
                                    <div id="gameContainer" style="width: 960px; height: 600px">
                                    </div>
                                    <div class="footer">
                                        <div class="webgl-logo"></div>
                                        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
                                        <div id="get-container">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function respuesta(id, duration, status) {
            $.get("{!!URL::to('/saveExerciceId')!!}", {
                id: id,
                duration: duration,
                status: status
            }, function (data) {
                $("#get-container").html(
                    "<div class='alert alert-success'><span><b> Info - </b></span>"+data[0].observation+" - Sesión Terminada</div>"
                );
            });
            //alert("ID: " + id + " DURATION: " + duration + " STATUS: " + status);
        }

        function getQueryVariable(variable) {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                if (pair[0] == variable) {
                    return pair[1];
                }
            }
            return (false);
        }

        setTimeout(Iniciar, 15000);

        function Iniciar() {
            ID("{{$id_exercice}}");
            Duration("{{$duracion}}");
            ID_His("{{$id_his}}");
            Difi("{{$difi}}");
            EyeL("{{$eyel}}");
            EyeR("{{$eyer}}");
            Status("{{$status}}");
            url("{!!URL::to('/saveExerciceId')!!}");
            /*
                        ID(getQueryVariable('id'));
                        Duration(getQueryVariable('duracion'));
                        ID_His(getQueryVariable('id_his'));
                        Difi(getQueryVariable('difi'));
                        EyeL(getQueryVariable('eyel'));
                        EyeR(getQueryVariable('eyer'));
                        Status(getQueryVariable('status'));
                        url(URL::to('/saveExerciceId')!!);

            */
        }

    </script>
@endsection

