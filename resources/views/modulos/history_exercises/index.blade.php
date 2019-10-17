@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebarmedico')
@endsection

@section('content_body')
    <div class="container-fluid">   
                <div class="card">
					<div class="well well-sm"><span class="titlePage">Listado de los Ejercicios registrados:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            {!! Form::open(['method' => 'GET', 'url' => '/modulos/history_exercises', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                <button type="submit" class="btn btn-info btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                            {!! Form::close() !!}
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th style="font-weight: bold !important;" rowspan="2">Observación</th>
                                    <th style="font-weight: bold !important;" rowspan="2">Paciente</th>
                                    <th style="font-weight: bold !important;" rowspan="2">Fecha Asiganación</th>
                                    <th style="font-weight: bold !important;" rowspan="2">Duración Min</th>
                                    <th style="font-weight: bold !important;" colspan="2" class="text-center">Sesiones</th>
                                    <th style="font-weight: bold !important;" rowspan="2"></th>
                                </tr>
                                <tr>
                                    <th style="font-weight: bold !important;">Programadas</th>
                                    <th style="font-weight: bold !important;">Realizadas</th>
                                </tr>
                                </thead>
                                @foreach($history_exercises as $item)
                                    <tr>
                                        <td>{{ $item->observation }}</td>
                                        <td>{{ ucwords(strtolower($item->name1)).' '.ucwords(strtolower($item->surname1)) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>{{ $item->session }}</td>
                                        <td>{{ $item->session_ok }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ url('/modulos/history_exercises_detail/' . Crypt::encrypt($item->id)) }}">
                                                <button type="button" rel="tooltip" title="Histórico Ejecución del Ejercicio"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            @if($item->session > $item->session_ok && $rol_user==4)
                                                <a href="{{ url('/modulos/history_exercises/playexercise/' . Crypt::encrypt($item->id)) }}">
                                                    <button type="button" rel="tooltip" title="Ejecutar el Ejercicio"
                                                            class="btn btn-info btn-simple btn-xs">
                                                        <i class="material-icons">play_circle_outline</i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="pagination-wrapper"> {!! $history_exercises->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
      

@endsection

@section('scripts')
@endsection
