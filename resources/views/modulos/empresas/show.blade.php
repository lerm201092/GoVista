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
                            <a href="{{ url('/modulos/empresas') }}">
                                <button type="button" rel="tooltip" title="Regresar"
                                        class="btn btn-warning btn-round btn-just-icon">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                            </a>
                            <a href="{{ url('/modulos/empresas/' . $empresa->id . '/edit') }}" title="Edit Empresa">
                                <button type="button" rel="tooltip" title="Editar Datos de la Empresa"
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
                                    <td>{{ $empresa->id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Nit</td>
                                    <td> {{ $empresa->nit }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Nombre</td>
                                    <td> {{ ucwords(mb_strtolower($empresa->nombre)) }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Departamento</td>
                                    <td> {{ $areas[0]->dpto }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Municipio</td>
                                    <td> {{ $areas[0]->municipio }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Dirección</td>
                                    <td> {{ $empresa->direccion }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> E-mail</td>
                                    <td> {{ $empresa->email }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Teléfono</td>
                                    <td> {{ $empresa->telefono }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Contacto</td>
                                    <td> {{ $empresa->contacto }} </td>
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
