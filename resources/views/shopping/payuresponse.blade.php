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
                    <div class="card-header" data-background-color="purple">
					<h4 class="title">Resumen Transacción</h4>
					</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                           <br><br>
                               <div class="row">
							    <div style="text-align: center !important;" class="col-md-12">
								<div class="row">
                                <div class="col-md-12" style="text-transform:uppercase !important;text-align:center !important;">
								<p style="color:white !important;background-color: {{ $transactionStateColor }} !important;">{{ $transactionStateText }}</p>       					
								</div>								 
                                </div>	
								<span style="text-align: center !important;text-transform: uppercase !important;">
								Referencia De Pago:&nbsp;<b>{{ $reference_pol }}</b><br>
								Fecha:&nbsp;<b>{{ $processingDate }}
								</span>	
                                <hr>						
								</div> 
								</div>
								<div class="row">
								<div class="col-md-6">
								<h6>Ref. Transaccion:&nbsp;<b>{{ $referenceCode }}</b></h6>	
								</div>
								<div class="col-md-6">
								<h6>ID Transaccion:&nbsp;<b>{{ $transactionId }}</b></h6>	
								</div>								
							</div>
							<div class="row">
							<div style="background: #eee !important;color: black !important;border-radius: 50px !important;" class="col-md-12">
							<h4 style="font-weight: bold !important;text-align: center !important;text-transform: uppercase !important;"><u>Detalles</u></h4>	
							</div>
							</div>
							<br>
							<div class="row">
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Descripción</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Valor Total</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Moneda</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Entidad</p>	
							</div>							
							</div>
							<br>
							<div class="row">
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;">{{ $description }}</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;">$ {{ number_format($txValue) }}</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;">{{ $currency }}</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;">{{ $lapPaymentMethod .' ('.$lapPaymentMethodType.')' }}</p>	
							</div>							
							</div>
							<br>
							@if ($isPSEBank == true)
							<div style="text-align: center !important;" class="row">
							<div title="Código Único de Seguimiento" class="col-md-6">
							<span style="font-weight: bold !important;">CUS</span><br>{{ $cus }} 
							</div>
							<div class="col-md-6">
							<span style="font-weight: bold !important;">Banco</span><br>{{ $pseBank }} 
							</div>							
							</div>
							@endif
							<br><br><br><br><br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection