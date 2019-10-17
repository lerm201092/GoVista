@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebarmedico')
@endsection

@section('content_body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
					<div class="well well-sm"><span class="titlePage">Histórico de los Ejercicios Realizados:</span></div>
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
                                    <th rowspan="2">ID</th>
                                    <th rowspan="2">Observación</th>
                                    <th rowspan="2">Fecha Asiganación</th>
                                    <th rowspan="2">Duración Min</th>
                                    <th colspan="2" class="text-center">Sesiones</th>
                                    <th rowspan="2"></th>
                                </tr>
                                <tr>
                                    <th>Programadas</th>
                                    <th>Realizadas</th>
                                </tr>
                                </thead>
                                @foreach($history_exercises as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->observation }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>{{ $item->session }}</td>
                                        <td>{{ $item->session_ok }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ url('/modulos/history_exercises_detail' . $item->id) }}">
                                                <button type="button" rel="tooltip" title="Ejecutar el Ejercicio"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">play_circle_outline</i>
                                                </button>
                                            </a>
                                            <a href="{{ url('/modulos/history_exercises/playexercise/' . $item->id) }}">
                                                <button type="button" rel="tooltip" title="Ejecutar el Ejercicio"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">play_circle_outline</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="pagination-wrapper"> {!! $history_exercises->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>

@endsection

@section('scripts')
@endsection
