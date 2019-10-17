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
                    <div class="well well-sm"><span class="titlePage">Información:</span></div>
                    <!--- Body -->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            <a href="{{ url('/modulos/medicos') }}">
                                <button type="button" rel="tooltip" title="Regresar"
                                        class="btn btn-warning btn-round btn-just-icon">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                            </a>
                            <a href="{{ url('/modulos/medicos/' . $medico[0]->id . '/edit') }}"
                               title="Edit Médico">
                                <button type="button" rel="tooltip" title="Editar Datos del Médico"
                                        class="btn btn-primary btn-round btn-just-icon">
                                    <i class="material-icons">edit</i>
                                </button>
                            </a>
                            <br/>
                            <br/>

                            <table class="table table-borderless">
                                <thead class="text-primary">
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-primary">ID</td>
                                    <td>{{ $medico[0]->id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Nombre</td>
                                    <td> {{ ucwords(mb_strtolower($medico[0]->name)) }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Especialidad</td>
                                    <td> {{ ucwords(mb_strtolower($medico[0]->specialty)) }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Empresa</td>
                                    <td> {{ ucwords(mb_strtolower($medico[0]->empresa)) }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Departamento</td>
                                    <td> {{ $medico[0]->dpto }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Municipio</td>
                                    <td> {{ $medico[0]->municipio }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Dirección</td>
                                    <td> {{ $medico[0]->address }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Teléfono</td>
                                    <td> {{ $medico[0]->phone }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> E-mail</td>
                                    <td> {{ $medico[0]->email }} </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!--- Fin Body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
