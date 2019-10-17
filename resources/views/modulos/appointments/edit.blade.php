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
					<div class="well well-sm"><span class="titlePage">Actualización de Cita:</span></div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">
                                    <a href="{{ url('/modulos/appointments') }}">
                                        <button type="button" rel="tooltip" title="Regresar"
                                                class="btn btn-warning btn-round btn-just-icon">
                                            <i class="material-icons">arrow_back</i>
                                        </button>
                                    </a>
                                    <br/>
                                    <br/>
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    {!! Form::model($appointment, [
                                        'method' => 'PATCH',
                                        'url' => ['/modulos/appointments', $appointment->id],
                                        'class' => 'form',
                                        'files' => true
                                    ]) !!}
                                    {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}
                                    @include ('modulos.appointments.form', ['submitButtonText' => 'Actualizar','start'=>$appointment->start])
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content_modal')
    <div class="modal fade" id="ModalPatient" tabindex="-1" role="dialog" aria-labelledby="ModalPatient"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Pacientes</h4>
                                <p class="category">Listado de los Pacientes registrados</p>
                            </div>
                            <!--Body-->
                            <div class="card-content table-responsive">
                                <div class="navbar-form navbar-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="searchPatientDoc"
                                               id="searchPatientDoc"
                                               placeholder="Documento...">&nbsp;
                                        <input type="text" class="form-control" name="searchPatientName"
                                               id="searchPatientName"
                                               placeholder="Nombre...">
                                        <button type="button" class="btn btn-info btn-round btn-just-icon"
                                                name="btnSearch" id="btnSearch">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                                <div id="div_search_patients" name="div_search_patients">
                                    <table class="table table-fixed">
                                        <thead class="text-primary">
                                        <th class="col-xs-2">ID</th>
                                        <th class="col-xs-10">Descripción</th>
                                        </thead>
                                    </table>
                                </div>
                                <br>
                                <div class="footer">
                                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                            <!-- End Body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        window.onload = function() {
            var searchId = $('#id_patient').val();
            if (searchId.length>0) {
                $.ajax({
                    type: 'GET',
                    url: '{!! URL::to('/findPatientsId') !!}',
                    data: {
                        'searchId': searchId,
                    },
                    dataType: 'json',
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            var paciente = data[i].tipodoc + ' ' + data[i].numdoc + ' - ' + data[i].name1 + ' ' + data[i].name2 + ' ' + data[i].surname1 + ' ' + data[i].surname2;
                            enviarDatosPatients( data[i].id , paciente);
                        }
                    }
                });
            }
        };

        $('#btnSearch').click(function () {
            var searchDoc = document.getElementById("searchPatientDoc").value;
            var searchName = document.getElementById("searchPatientName").value;

            var op = '<table class="table table-fixed"><thead class="text-primary">' +
                '<th class="col-xs-2">ID</th>' +
                '<th class="col-xs-10">Descripción</th>' +
                '</thead>';
            $.ajax({
                type: 'GET',
                url: '{!! URL::to('/findPatientsLike') !!}',
                data: {
                    'searchdoc': searchDoc,
                    'searchname': searchName
                },
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        var paciente = data[i].tipodoc + ' ' + data[i].numdoc + ' - ' + data[i].name1 + ' ' + data[i].name2 + ' ' + data[i].surname1 + ' ' + data[i].surname2;
                        var names = "onclick='enviarDatosPatients(\"" + data[i].id + "\",\"" + paciente + "\")\'";
                        op += "<tr>" +
                            "<td class='col-xs-2'>" + data[i].id + "</td>" +
                            "<td class='col-xs-10'><a href='javascript:void(0);' data-dismiss='modal' class='text-gray' " + names + "  > " + paciente + "</a></td>" +
                            "</tr>";
                    }
                    op += '</table>';
                    op += '<br><label class="text-primary">Total de Registros : ' + data.length + '</label>';
                    $("#div_search_patients").empty();
                    $("#div_search_patients").append(op);
                }
            });
        });

        function enviarDatosPatients(id, name) {
            $("#id_patient").val(id);
            $("#id_patient").trigger("change");
            $("#name_patient").val(name);
            $("#name_patient").trigger("change");

        }

        function limpiarModalPatient() {
            $("#searchPatientDoc").val('');
            $("#searchPatientName").val('');
            var op = '<table class="table table-fixed"><thead class="text-primary">' +
                '<th class="col-xs-2">ID</th>' +
                '<th class="col-xs-10">Descripción</th>' +
                '</thead>' +
                '</table>' +
                '<br><label class="text-primary">Total de Registros : 0</label>';
            $("#div_search_patients").empty();
            $("#div_search_patients").append(op);
        }

        $('.form_datetime').datetimepicker({
            language: 'es',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });

    </script>
@endsection