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
					<div class="well well-sm"><span class="titlePage">Listado de las Historias Clínicas registradas:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            {!! Form::open(['method' => 'GET', 'url' => '/modulos/histories', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>Fecha/Hora HC</th>
                                <th>Tipo Doc.</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Médico</th>
                                <th>Estado</th>
                                <th></th>
                                </thead>
                                @foreach($histories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->historydate }}</td>
                                        <td>{{ $item->tipodoc }}</td>
                                        <td>{{ $item->numdoc }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->name1.' '.$item->name2)) }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->surname1.' '.$item->surname2)) }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->state }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ url('/modulos/histories/' . $item->id) }}">
                                                <button type="button" rel="tooltip"
                                                        title="Ver Datos de la Historia Clínica"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="{{ url('/modulos/histories/dashboard/' . $item->id_patient) }}">
                                                <button type="button" rel="tooltip"
                                                        title="Ver Panel de Usuario"
                                                        class="btn btn-success btn-simple btn-xs">
                                                    <i class="material-icons">dashboard</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="pagination-wrapper"> {!! $histories->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
    </div>
@endsection
