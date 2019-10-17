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
					<div class="well well-sm"><span class="titlePage">Lista de Pacientes Registrados:</span></div>					
                    <!--Body-->
                    <div class="card-content table-responsive">
                            <a href="{{ url('/modulos/patients/create') }}"
                               class="btn btn-success btn-round btn-just-icon"
                               title="Crear Nuevo Paciente">
                                <i class="material-icons">add</i>
                            </a>
                            {!! Form::open(['method' => 'GET', 'url' => '/modulos/patients', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                            
							<div class="input-group">
								<button onclick="javascript:pacientesAll();" type="button" class="btn btn-warning btn-primary"><i class="material-icons">group</i>Todos</button>
                            </div>
							
							<div class="input-group">
								<button onclick="javascript:pacientesActivos();" type="button" class="btn btn-info btn-primary"><i class="material-icons">done_all</i>Activos</button>
                            </div>
							
							<div class="input-group">
								<button onclick="javascript:pacientesInactivos();" type="button" class="btn btn-danger btn-primary"><i class="material-icons">info_outline</i>Inactivos</button>
                            </div>
							
							<div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                <button type="submit" class="btn btn-info btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                            {!! Form::close() !!}
                            <table id="tableMain" class="table">
                                <thead class="text-primary">
                                <!-- <th>ID</th> -->
                                <th>Tipo Doc.</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Municipio</th>
								<th>Estado</th>
                                <th></th>
                                </thead>
                                @foreach($patients as $item)
                                    <tr class="{{ ($item->state == 'AC')? 'activeItem' : 'inactiveItem' }}">
                                        <!-- <td>{{ $item->id }}</td> -->
                                        <td>{{ $item->tipodoc }}</td>
                                        <td>{{ $item->numdoc }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->name1.' '.$item->name2)) }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->surname1.' '.$item->surname2)) }}</td>
                                        <td>{{ ucwords(mb_strtolower($item->munic.' ( '.$item->dpto.' )')) }}</td>
										<td>{{ $item->state }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ url('/modulos/patients/' . $item->id) }}">
                                                <button type="button" rel="tooltip" title="Ver Datos del Paciente"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="{{ url('/modulos/patients/' . $item->id . '/edit') }}">
                                                <button type="button" rel="tooltip"
                                                        title="Editar Datos del Paciente"
                                                        class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="pagination-wrapper"> {!! $patients->appends(['search' => Request::get('search')])->render() !!} </div>
                     
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script type="text/javascript">
function pacientesActivos() {
	pacientesAll();
	$(".inactiveItem").css("display", "none"); 
};
function pacientesInactivos() {
	pacientesAll();
	$(".activeItem").css("display", "none");
};
function pacientesAll() {
	$(".activeItem").css("display", "revert"); 
	$(".inactiveItem").css("display", "revert");
};
    </script>
@endsection
 

