@extends('layouts.newinicio')

@section('content')
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="text-transform: uppercase !important;background: #55b559 !important;color: white !important;font-weight: normal !important;" class="panel-heading">Consultar Su Correo Electrónico:</div>
                <div class="panel-body"> 
				<p style="color: black !important;font-weight: normal;">Se ha enviado un link de activación a <b>{{ $email }}</b></p>
                <p style="color: black !important;font-weight: normal;">Una vez que verifique su cuenta a través del link recibido en su correo electrónico, puede continuar el proceso de ingreso.</p>
				<p style="color: black !important;font-weight: normal;">Acceso al sistema:&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="{!!URL::to('/login')!!}" target="_parent">{!!URL::to('/login')!!}</a></b></p>
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection
