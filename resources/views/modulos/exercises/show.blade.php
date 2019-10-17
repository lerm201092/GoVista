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
                            <a href="{{ url('/modulos/exercises') }}">
                                <button type="button" rel="tooltip" title="Regresar"
                                        class="btn btn-warning btn-round btn-just-icon">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                            </a>
                            <a href="{{ url('/modulos/exercises/' . $exercise->id . '/edit') }}"
                               title="Edit Médico">
                                <button type="button" rel="tooltip" title="Editar Datos del Ejercicio"
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
                                    <td>{{ $exercise->id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Descripción</td>
                                    <td> {{ ucwords(mb_strtolower($exercise->description)) }} </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Observaciones</td>
                                    <td> {{ ucwords(mb_strtolower($exercise->observation)) }} </td>
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
