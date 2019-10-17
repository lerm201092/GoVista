@extends('layouts.newinicio')

@section('content')
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="text-transform: uppercase !important;background: #9c27b0 !important;color: white !important;font-weight: normal !important;" class="panel-heading">Resetear Contraseña</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                      
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label style="font-size: 15px !important;color: #000 !important;" for="email" class="col-md-4 control-label">Correo Electrónico:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label style="font-size: 15px !important;color: #000 !important;" for="password" class="col-md-4 control-label">Contraseña:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" data-toggle="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label style="font-size: 15px !important;color: #000 !important;" for="password_confirmation" class="col-md-4 control-label">Confirmar Contraseña:</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" data-toggle="password" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Put icon see password in input -->
	<script src="{{ asset('assets/js/bootstrap-show-password.min.js') }}" type="text/javascript"></script>	 
	<script type="text/javascript">
	$("#password").password('toggle');
	$("#password_confirmation").password('toggle');
    </script>
	
@endsection
