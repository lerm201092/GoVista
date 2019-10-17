@extends('layouts.newinicio')

@section('content')
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="text-transform: uppercase !important;background: #55b559 !important;color: white !important;font-weight: normal !important;" class="panel-heading">Su Cuenta Ha Sido Activada!</div>
                <div class="panel-body"> 
				<p style="color: black !important;font-weight: normal;">El usuario de acceso es <b>{{ $userID }}</b></p>
                <br>
				<p style="color: black !important;font-weight: normal;">Acceso al sistema:&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="{!!URL::to('/login')!!}" target="_parent">{!!URL::to('/login')!!}</a></b></p>
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection