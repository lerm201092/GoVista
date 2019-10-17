@extends('layouts.admon')

<!-- SideBar -->
@if(Auth::user()->roluser == 1  )
@section('content')
    @include ('bar.sidebar')
@endsection
@endif
@if(Auth::user()->roluser == 2  )
@section('content')
    @include ('bar.sidebarmedico')
@endsection
@endif
@if(Auth::user()->roluser == 3  )
@section('content')
    @include ('bar.sidebarmedico')
@endsection
@endif
@if(Auth::user()->roluser == 4  )
@section('content')
    @include ('bar.sidebarmedico')
@endsection
@endif

@section('content_body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
					<div class="well well-sm"><span class="titlePage">Cambiar Contraseña:</span></div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                            {{ csrf_field() }}					
							
							<div class="form-group row">
                                            <label for="current-password" class="col-md-4 col-form-label text-md-right">Contraseña Actual</label>
                                            <div class="col-md-6">
                                                <input id="current-password" type="password" class="form-control" name="current-password" data-toggle="password" required />
												@if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                            </div>
                                        </div>							
							
							<div class="form-group row">
                                            <label for="new-password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>
                                            <div class="col-md-6">
                                                <input id="new-password" type="password" class="form-control" name="new-password" data-toggle="password" required />
												@if ($errors->has('new-password'))
                                        <span class="help-block">
                                         <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>	
                                    @endif
                                            </div>
                                        </div>
							
							<div class="form-group row">
                                            <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Nueva Contraseña</label>
                                            <div class="col-md-6">
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password-confirm" data-toggle="password" required />
												@if ($errors->has('new-password-confirm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password-confirm') }}</strong>
                                    </span>
                                    @endif
                                            </div>
                                        </div>	
								
    <!-- Alert message -->								
    @if(Session::has('flash_message'))
    <div style="padding: 20px 30px !important;" class="alert alert-danger alert-dismissible fade in">
     <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Error:&nbsp;</strong>{{ Session::get('flash_message') }}
    </div>
	@endif							
													

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
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
	$("#current-password").password('toggle');
	$("#new-password").password('toggle');
	$("#new-password-confirm").password('toggle');
    </script>
	
	<!-- Alert message -->	
	<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
	}, 3000);
	</script>
	
@endsection


