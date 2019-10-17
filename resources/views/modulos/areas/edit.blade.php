@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Area #{{ $area->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/modulos/areas') }}" title="Back">
                            <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
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

                        {!! Form::model($area, [
                            'method' => 'PATCH',
                            'url' => ['/modulos/areas', $area->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('modulos.areas.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#id_tipo').change(function () {
                var cat_id = $(this).val();
                // console.log(cat_id);
                var div = $(this).parent();
                var op = '<select class="form-control" name="padre" id="padre">';

                $.ajax({
                    type: 'GET',
                    url: '{!!URL::to('/findAreaTipo')!!}',
                    data: {'id': cat_id},
                    dataType: 'json',
                    success: function (data) {
                        op += '<option value="0" selected disabled>Seleccione Area</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nomarea + '</option>';
                        }
                        op += '</select>'
                        $("#padre_cmb").empty();
                        $("#padre_cmb").append(op);
                    }
                });
            });
        });
    </script>
@endsection
