@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Area</div>
                    <div class="panel-body">
                        <a href="{{ url('/modulos/areas') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/modulos/areas', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('modulos.areas.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

    $(document).ready(function(){
        $('#empresa_id').change(function(){
			var cat_id=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent();
            var op=" ";
            //alert('Entro->'+cat_id);
            $.ajax({
                type:'get',
                url:'{!!URL::to('findAreaTipo')!!}',
                data:{'id':cat_id},
                success:function(data){
                    //console.log('success');
                    //console.log(data);
                    //console.log(data.length);
                    op+='<option value="0" selected disabled>Seleccione Area</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].nomarea+'</option>';
                    }

                    div.find('.detalle_area').html(" ");
                    div.find('.detalle_area').append(op);
                },
                error:function(){

                }
            });
        });
    });
    </script>
@endsection