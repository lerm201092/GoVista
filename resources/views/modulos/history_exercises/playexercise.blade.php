@extends('layouts.admon')

@section('content_styles1')
    <link rel="stylesheet" href="{{ asset('exercises/exercise_'.$exercise.'/TemplateData/style.css') }}">
    <script src="{{ asset('exercises/exercise_'.$exercise.'/TemplateData/UnityProgress.js') }}"></script>
    <script src="{{ asset('exercises/exercise_'.$exercise.'/Build/UnityLoader.js') }}"></script>

    <script>
        var gameInstance = UnityLoader.instantiate("gameContainer", "{{ asset('exercises/exercise_'.$exercise.'/Build/exercise-'.$exercise.'.json') }}");
    </script>

    <script>

        function SetData() {
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetUserName',".'"'.$username .'")' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetId',". $exercise  .')' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetIdHis',". $id_his  .')' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetDuration',".  $duracion .')' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetSize', ". $size   .')' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetLeft', ".'"'.$eyel.'")' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetRight', ".'"'. $eyer .'")' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetAge', ". $edad .')' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetStatus', ".'"'. $status .'")' !!};
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetReturnUrl',".'"'. url('/modulos/history_exercises') .'")' !!};//url a la cual volver cuando se termine el juego o el jugador se salga por el menu de pause
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetSnellenValues',".'"'. '-' .'")' !!};//en caso de que se quieran sobreescribir los valores de la tabla de snellen, si no dejar asi
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetPlayDistance',". '0'.')' !!};//en caso de que se quiera cambiar la distancia de juego por defecto, actualmente 1m, si no dejar asi
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetCoins', ". $coins .')' !!};//monedas ganadas por el jugador, acciones acertadas
            {!! "gameInstance.SendMessage('MinigameHUD', 'SetStars', ". $starts .')' !!};//estrellas ganadas por el jugador, juegos completados exitosamente
        }

        var isAjaxState = false;
        function SaveData(id, id_history, duration, Failure, Progress, status_game, coins, stars)//metodo llamado por el juego para guardar los datos
        {
            // window.alert("ID "+ {{ $id }} + "\nHistory " + id_history + "\nDuracion " + duration + "\nFallido " + Failure + "\nProgress " + Progress + "\nStatus " + status_game + "\nCoins " + coins + "\nStars " + stars)
    
		    /* var ok = true; // for testing
            if(ok) {
                $.get("{!!URL::to('/saveExerciceId')!!}", {
                    id: {{ $id }},
                    duration: duration,
                    status: status_game,
                    coins: coins,
                    stars: stars,
                    failure: Failure,
                    progress: Progress
                }, function (data) {
                    $("#get-container").html(
                        "<div class='alert alert-success'><span><b> Info - </b></span>" + data[0].observation + " - Sesión Terminada</div>"
                    );
                });
            };*/
			
			$.ajax({url: "{!!URL::to('/saveExerciceId')!!}",
			async: false,
			type: 'GET',
			timeout: 60000,
			data: {
				id: {{ $id }},
                duration: duration,
                status: status_game,
                coins: coins,
                stars: stars,
                failure: Failure,
                progress: Progress
			},              			
			    success: function(result, status, xhr){					 
					 if (status == "success") { isAjaxState = true; }
			},
			    error: function(result, status, xhr){					 
					 isAjaxState = false;
			}
			});
			
        }

        function ForceSave() { // Intento de que al jugador cerrar el navegador primero guarde los datos de juego, no estoy seguro de si esta funcionando correctamten igual es opcional
            if (!isAjaxState) {
			gameInstance.SendMessage('MinigameHUD','ForceSave');
			}
        }

        window.onbeforeunload = function() { // Funciona con el metodo de arriba		    
			if (!isAjaxState) {
            ForceSave();
			}
            return "asd";
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
                    <div class="well well-sm"><span class="titlePage">Ejercicio No. {{ $exercise }}:</span></div>
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
                                    <div id="gameContainer" style="width: 960px; height: 600px"></div>
                                    <div class="footer">
                                        <div class="webgl-logo"></div>
                                        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
                                        <div class="title"><i style="color: #9c27b0 !important;" class="material-icons">fitness_center</i> GoVista App 1.0</div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="col-md-10">
                                 <iframe src="{{ asset('exercises/exercise_'.$exercise.'/index.html') }}" height="600" width="1000"></iframe>
                            </div>
                            --->

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
                    "<div class='alert alert-success'><span><b> Info - </b></span>" + data[0].observation + " - Sesión Terminada</div>"
                );
            });			
            //alert("ID: " + id + " DURATION: " + duration + " STATUS: " + status);
        }
    </script>
@endsection

