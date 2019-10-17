@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebarmedico')
@endsection

@section('content_body')
    <div class="container-fluid">
                <div class="card">                   
					<div class="well well-sm"><span class="titlePage">Información De Cita:</span></div>
                    <!--- Body -->
                    <div class="card-content">
                            <a href="{{ url('/modulos/appointments') }}">
                                <button type="button" rel="tooltip" title="Regresar"
                                        class="btn btn-warning btn-round btn-just-icon">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                            </a>
                            @if(Auth::user()->roluser<>4  )
                            <a href="{{ url('/modulos/appointments/' . $appointment[0]->id . '/edit') }}" title="Edit Citas">
                                <button type="button" rel="tooltip" title="Editar Datos de la Cita"
                                        class="btn btn-primary btn-round btn-just-icon">
                                    <i class="material-icons">edit</i>
                                </button>
                            </a>
                            @endif
                            <br/>
                            <br/>

                            <table class="table table-borderless">
                                <thead class="text-primary">
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                <!-- <tr>
                                    <td class="text-primary">ID</td>
                                    <td>{{ $appointment[0]->id }}</td>
                                </tr> -->
                                <tr>
                                    <td style="font-weight: bold !important;" class="text-primary">Documento</td>
                                    <td> {{ $appointment[0]->tipodoc.' '.$appointment[0]->numdoc }} </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important;" class="text-primary">Paciente</td>
                                    <td> {{ $appointment[0]->surname1.' '.$appointment[0]->surname2.' '.$appointment[0]->name1.' '.$appointment[0]->name2 }} </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important;" class="text-primary">Motivo de Consulta</td>
                                    <td> {{ $appointment[0]->title }} </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important;" class="text-primary">Descripción de la Consulta</td>
                                    <td> {{ $appointment[0]->body }} </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important;" class="text-primary"> Médico</td>
                                    <td> {{ $appointment[0]->name }} </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important;" class="text-primary">Fecha / Hora de la Cita</td>
                                    <td> {{ $appointment[0]->start }} </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important;" class="text-primary"> Teléfono</td>
                                    <td> {{ $appointment[0]->phone }} </td>
                                </tr>

                                </tbody>
                            </table>
                       
                        <!--- Fin Body -->
                    </div>
                </div>
           
    
    </div>
@endsection
