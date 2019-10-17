@extends('layouts.newinicio')

@section('content')
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">	
        <div class="col-md-8 col-md-offset-2">	
       @if (session('status'))
        <div class="alert alert-success">
           {{ session('status') }}
        </div>
       @endif
	   @if (session('error'))
        <div class="alert alert-danger">
           {{ session('error') }}
        </div>
       @endif		
            <div class="panel panel-default">
                <div style="text-transform: uppercase !important;background: #9c27b0 !important;color: white !important;font-weight: normal !important;" class="panel-heading">Restablecer Contraseña</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label style="font-size: 15px !important;color: #000 !important;" for="email" class="col-md-4 control-label">Correo Electrónico:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>							
							<div style="text-align: center !important;" class="form-group">
							<button class="btn btn-primary btn-sm" onclick="javascript:window.location='{{ route('login') }}';"id="next-btn-smartwizard" type="button"><i class="material-icons">keyboard_arrow_left</i>&nbsp;Regresar&nbsp;</button>
							&nbsp;&nbsp;&nbsp;
							<button class="btn btn-primary btn-sm" id="prev-btn-smartwizard" type="submit">&nbsp;Enviar&nbsp;<i class="material-icons">send</i></button>
							</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Alert message -->	
	<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
	}, 3000);
	</script>

@endsection
