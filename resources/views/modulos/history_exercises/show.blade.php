@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebarmedico')
@endsection

@section('content_body')
    <a href="{{ url('/modulos/history_exercises') }}" title="Back">
        <button type="button" rel="tooltip" title="Regresar"
                class="btn btn-warning btn-round btn-just-icon">
            <i class="material-icons">arrow_back</i>
        </button>
    </a>
    <!--- Ejecución de Exercicio --->
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="col-lg-12 col-md-12 col-sm-12"
                src="/exercises/exercise_{{ $exercise }}/index.php?id={{ $id_exercice }}&duracion={{ $duracion }}&id_his={{ $id_his }}&difi={{ $difi }}&eyel={{ $eyel }}&eyer={{ $eyer }}&status={{ $status }}"
                allowfullscreen>
        </iframe>
    </div>
@endsection

