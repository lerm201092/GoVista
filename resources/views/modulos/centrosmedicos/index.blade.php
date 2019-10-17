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
                    <div class="well well-sm"><span class="titlePage">Listado De Los Centros Médicos Registrados:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            <a href="{{ url('/modulos/centrosmedicos/create') }}"
                               class="btn btn-success btn-round btn-just-icon"
                               title="Crear Nuevo Centro Médico">
                                <i class="material-icons">add</i></a>

                            {!! Form::open(['method' => 'GET', 'url' => '/modulos/centrosmedicos', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Empresa</th>
                                <th>Municipio</th>
                                <th></th>
                                </thead>

                                <tbody>
                                @foreach($centrosmedicos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->empresa }}</td>
                                        <td>{{ $item->nomarea }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ url('/modulos/centrosmedicos/' . $item->id) }}">
                                                <button type="button" rel="tooltip" title="Ver Datos del Centro Médico"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="{{ url('/modulos/centrosmedicos/' . $item->id . '/edit') }}">
                                                <button type="button" rel="tooltip"
                                                        title="Editar Datos del Centro Médico"
                                                        class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $centrosmedicos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
    </div>
@endsection
