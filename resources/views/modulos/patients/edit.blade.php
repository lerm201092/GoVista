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
					<div class="well well-sm"><span class="titlePage">Editar Datos Del Paciente:</span></div>                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">							
                                <div class="panel-body">                                   
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif                                    
                                    {!! Form::model($patient, [
                                        'method' => 'PATCH',
                                        'url' => ['/modulos/patients', $patient->id],
                                        'class' => 'form',
                                        'files' => true
                                    ]) !!}
                                    {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}
                                    @include ('modulos.patients.form', ['submitButtonText' => 'Actualizar','birthdate'=>$patient->birthdate])
									<a href="{{ url('/modulos/patients') }}">
                                        <button type="button" class="btn btn-primary">
                                            <i class="material-icons">arrow_back</i>Regresar
                                        </button>
                                    </a>
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

@section('scripts')
    <script type="text/javascript">

        $('.form_date').datetimepicker({
            language:  'es',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });

        $(document).ready(function () {
            $('#dpto_cmb').change(function () {
                var cat_id = $(this).val();
                // console.log(cat_id);
                var div = $(this).parent();
                var op = '<label class="control-label">Municipio</label>';
                op += '<select class="form-control" name="id_area" id="id_area">';

                $.ajax({
                    type: 'GET',
                    url: '{!!URL::to('/findAreaPadre')!!}',
                    data: {'id': cat_id},
                    dataType: 'json',
                    success: function (data) {
                        op += '<option value="0" selected disabled>Seleccione Area</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nomarea + '</option>';
                        }
                        op += '</select>'
                        op += "{!! $errors->first('estado', '<p class="help-block">:message</p>') !!}";
                        $("#div_municipio").empty();
                        $("#div_municipio").append(op);
                    }
                });
            });
            $('#dpto_cmb_contact').change(function () {
                var cat_id = $(this).val();
                // console.log(cat_id);
                var div = $(this).parent();
                var op = '<label class="control-label">Municipio</label>';
                op += '<select class="form-control" name="contact_city" id="contact_city">';
                $.ajax({
                    type: 'GET',
                    url: '{!!URL::to('/findAreaPadre')!!}',
                    data: {'id': cat_id},
                    dataType: 'json',
                    success: function (data) {
                        op += '<option value="0" selected disabled>Seleccione Area</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nomarea + '</option>';
                        }
                        op += '</select>'
                        op += "{!! $errors->first('contact_city', '<p class="help-block">:message</p>') !!}";
                        $("#div_municipio_contact").empty();
                        $("#div_municipio_contact").append(op);
                    }
                });
            });
        });

    </script>
@endsection