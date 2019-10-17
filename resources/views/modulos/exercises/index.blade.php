@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebar')
@endsection

@section('content_body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Listado De Los Ejercicios Registrados:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            <a href="{{ url('/modulos/exercises/create') }}"
                               class="btn btn-success btn-round btn-just-icon"
                               title="Crear Nuevo Centro Médico">
                                <i class="material-icons">add</i>
                            </a>
                            {!! Form::open(['method' => 'GET', 'url' => '/modulos/exercises', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Observaciones</th>
                                <th></th>
                                </thead>
                                @foreach($exercises as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->observation }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ url('/modulos/exercises/' . $item->id) }}">
                                                <button type="button" rel="tooltip" title="Ver Datos del Médico"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="{{ url('/modulos/exercises/' . $item->id . '/edit') }}">
                                                <button type="button" rel="tooltip"
                                                        title="Editar Datos del Médico"
                                                        class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="pagination-wrapper"> {!! $exercises->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
@endsection
