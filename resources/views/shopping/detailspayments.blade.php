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
					<div class="well well-sm"><span class="titlePage">Detalles De Pagos:</span></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif                    
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif 
                                @if (count($ListPayments) > 0)
                                <hr>									
								<table class="table">
                                <thead class="text-primary">
                                <tr>
								    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Codigo Referencia</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Descripción</th>
									<th style="text-align: center !important;font-weight: bold !important;" rowspan="5"># Sesiones</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Valor</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Fecha Creado</th>
									<th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Estado</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" colspan="5" class="text-center">Datos De La Transacción</th>                                   
                                </tr>
								<tr>
                                    <th style="text-align: center !important;font-weight: bold !important;">Fecha Transacción</th>
                                    <th style="text-align: center !important;font-weight: bold !important;">ID Transacción</th>
									<th style="text-align: center !important;font-weight: bold !important;">Referencia Pago</th>
									<th style="text-align: center !important;font-weight: bold !important;">CUS</th>
									<th style="text-align: center !important;font-weight: bold !important;">Entidad Bancaria (PSE)</th>
                                </tr>
								</thead>
								<tbody>	                                							
								@foreach($ListPayments as $item)								
								<tr>
								<td style="text-align: center !important;">{{ $item->reference_code }}</td>
								<td style="text-align: center !important;">{{ $item->description }}</td>
								<td style="text-align: center !important;">{{ $item->total_sessiones }}</td>
								<td style="text-align: center !important;">$ {{ number_format($item->value) }}</td>
								<td style="text-align: center !important;">{{ $item->created_at }}</td>
								<td style="text-align: center !important;">{{ $item->state_pol }}</td>
								<td style="text-align: center !important;">{{ $item->transaction_date }}</td>
								<td style="text-align: center !important;">{{ $item->transaction_id }}</td>
								<td style="text-align: center !important;">{{ $item->reference_pol }}</td>								
								<td style="text-align: center !important;">{{ $item->cus }}</td>								
								<td style="text-align: center !important;">{{ $item->pse_bank }}</td>
								</tr>
								@endforeach						
								</tbody>
								</table>
								@endif
                                @if (count($ListPayments) == 0)
								<div style="text-align: center !important;" class="container">	
                                    <br>
									<hr>									
									<h4>
									<i style="color: #8e24aa !important;" class="material-icons">payment</i><br>
									Usted No Ha Realizado Ningún Tipo De Transacción Con Nosotros.
									</h4>
									<hr>
									<br>
							    </div>
								@endif	                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection