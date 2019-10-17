@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebar');
@endsection

@section('content_body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Actualización:</span></div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">
                                    <a href="{{ url('/modulos/centrosmedicos') }}">
                                        <button type="button" rel="tooltip" title="Regresar"
                                                class="btn btn-warning btn-round btn-just-icon">
                                            <i class="material-icons">arrow_back</i>
                                        </button>
                                    </a>
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    {!! Form::model($centrosmedico, [
                                        'method' => 'PATCH',
                                        'url' => ['/modulos/centrosmedicos', $centrosmedico->id],
                                        'class' => 'form',
                                        'files' => true
                                    ]) !!}
                                    {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}
                                    @include ('modulos.centrosmedicos.form', ['submitButtonText' => 'Actualizar'])
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
        });
    </script>
@endsection