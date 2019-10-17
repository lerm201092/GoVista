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
					<div class="well well-sm"><span class="titlePage">Carrito De Compras:</span></div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
						@if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="container">
						<br>
                            <div class="row">
                                <div class="col-12">
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

				<!-- Module Shopping Cart -->				
				@if (\Cart::count() > 0)
				<div class="row">
                <div class="col-md-8">
				<div class="row">
              <div class="col-md-12">       
		      <!-- being: content cart details -->
		      <table id="summaryOrders" class="table">
   	<thead>
       	<tr>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Producto</th>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Cantidad</th>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Precio</th>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Subtotal</th>
       	</tr>
   	</thead>
   	<tbody>
   		@foreach(Cart::content() as $row)
       		<tr>
           		<td>
               		{{ $row->name }}               		
           		</td>
           		<td>				
				<select onchange="javascript:listqtyUpdate({{ $row->id }});" style="width: 60px !important;" class="form-control" id="listqty_{{ $row->id }}" name="listqty_{{ $row->id }}">
				@for ($x = 1; $x <= 10; $x++)
				<option value="{{$x}}" {{ ($row->qty == $x)? "selected" : "" }}>{{$x}}</option>
				@endfor
                </select> 
		        </td>		
           		<td>$ {{ number_format($row->price) }}</td>
           		<td>$ {{ number_format($row->total) }}</td>
				<td>
			<a href="{{ url('remove-to-cart/'.$row->id) }}" style="background:#f44336 !important;" class="btn btn-primary btn-xs" role="button"><i class="material-icons">delete_forever</i></a>
			</td>
       		</tr>
	   	@endforeach
   	</tbody>   	
   	<tfoot>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td style="text-transform: uppercase !important;">Subtotal</td>
   			<td>$ {{ Cart::subtotal() }}</td>
   		</tr>   		
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td style="text-transform: uppercase !important;">Total</td>
   			<td>$ {{ Cart::total() }}</td>
			<td>&nbsp;</td>
   		</tr>		
   	</tfoot>	
</table>
<a href="{{ route('productList') }}" style="background:#8e24aa !important;" class="btn btn-md btn-primary" role="button">Continuar Comprando</a>
 <!-- end: content cart details -->
        </div>
      </div>      
    </div> 
    <div style="border:1px solid #eee !important;text-align: left !important;" class="col-md-4">
<!-- begin: content summary -->
 <p style="text-align: center !important;text-transform:uppercase !important;"><b><u>Resumen de tu compra:</u></b></p>
 <table class="table"> 
 @foreach(Cart::content() as $row)
<form id="formHidden"> 
 <input name="TotalSesiones[]" type="hidden" value="{{ $row->options->sesiones * $row->qty }}" />
 <input name="descItem[]"  type="hidden" value="{{ $row->name .' ('. $row->qty .')' }}" />
</form>
       		<tr>
           		<td>
               		<p><strong>{{ $row->name }} <b style="font-weight: normal !important;font-size: 14pt !important;">x {{ $row->qty }} </b></strong></p>               		
           		</td>
				<td>
               		<p><strong>$ {{ number_format($row->price) }}</strong></p>               		
           		</td> 
       		</tr>
 @endforeach
 <tr>
 <td>
 <p style="text-transform: uppercase !important;font-weight: bold !important;">Subtotal</p>
 </td>
 <td>
 <p><span style="font-weight: normal !important;color: #ea2840 !important;">$ {{ Cart::subtotal() }}</span></p>
 </td>
 </tr> 
 <tr>
 <td>
 <p style="text-transform: uppercase !important;font-weight: bold !important;">Total </p> 
 </td>
 <td>
 <p><span style="font-weight: normal !important;color: #ea2840 !important;">$ {{ Cart::total() }}</span></p> 
 </td>
 </tr> 
 </table>
  <div style="text-align: center !important;">
 <hr>
 @php
    $amount   = str_replace(",","", Cart::total());
	$amount   = preg_replace("/\.?0*$/",'',$amount);
	$refCode  = md5(time());
	$signHASH = "";	
	if (env('MODE_TEST_PAYU') == true) {
	$sign     = env('TEST_API_KEY')."~".env('TEST_MERCHANT_ID')."~".$refCode."~".$amount."~".env('CURRENCY');
	$signHASH = md5($sign);	
	} else {
	$sign     = env('API_KEY')."~".env('MERCHANT_ID')."~".$refCode."~".$amount."~".env('CURRENCY');
	$signHASH = md5($sign);	
	}
 @endphp 
<form id="formPayU" name="formPayU" method="post" action="{{ (env('MODE_TEST_PAYU') == true)? env('URL_TEST') : env('URL_PRODUCTION') }}" target="_self">
  <input name="merchantId"      type="hidden"  value="{{ (env('MODE_TEST_PAYU') == true)? env('TEST_MERCHANT_ID') : env('MERCHANT_ID') }}" />
  <input name="accountId"       type="hidden"  value="{{ (env('MODE_TEST_PAYU') == true)? env('TEST_ACCOUNT_ID') : env('ACCOUNT_ID') }}" />
  <input name="description"     type="hidden"  value="" id="descProducts" />
  <input name="referenceCode"   type="hidden"  value="{{ $refCode }}" />
  <input name="amount"          type="hidden"  value="{{ $amount }}" /> 
  <input name="tax"             type="hidden"  value="{{ env('TAX') }}" />
  <input name="taxReturnBase"   type="hidden"  value="{{ env('TAX_RETURN_BASE') }}" />
  <input name="currency"        type="hidden"  value="{{ env('CURRENCY') }}" />
  <input name="signature"       type="hidden"  value="{{ (env('MODE_TEST_PAYU') == true)? $signHASH : $signHASH }}" />  
  <input name="test"            type="hidden"  value="{{ (env('MODE_TEST_PAYU') == true)? 1 : 0 }}" />
  <input name="buyerEmail"      type="hidden"  value="{{ auth()->user()->email }}" />
  <input name="buyerFullName"   type="hidden"  value="{{ auth()->user()->nombres .' '. auth()->user()->apellidos }}" />
  <input name="responseUrl"     type="hidden"  value="{!!URL::to('/payuresponse')!!}" />
  <input name="confirmationUrl" type="hidden"  value="{!!URL::to('/payuconfirmation')!!}" /> 
  <input style="background:#8e24aa !important;" class="btn btn-md btn-primary" type="button" id="submitBtn" value="Procesar Compra" /> 
</form>
 <hr> 
 <img style="width: 150px !important;height: 60px !important;" src="{{ asset('img/products/security_buye.jpg') }}" />
 <hr>
 <img style="width: 300px !important;height: 50px !important;" src="{{ asset('img/products/payupagosseguros.png') }}" />
 </div>
 <!-- end: content summary -->
    </div>
  </div>	 
@else
	<div style="text-align: center !important;" id="infoCart">
    <br><br>
	<i style="color:#8e24aa !important;font-size: 25pt !important;" class="material-icons">shopping_cart</i>	
	<h3 style="color:#8e24aa !important;">No tienes productos en tu carrito</h3>
	<hr>
	<h4>Haz clic en el botón <b>"Ir a Comprar"</b> si deseas adquirir alguno de nuestros paquetes.</h4>
	<hr>
	<br><br>
	<div class="btn-container col-md-4 col-md-offset-4">
          <a href="{{ route('productList') }}" style="background:#8e24aa !important;" class="btn btn-md btn-primary" role="button">Ir a Comprar</a>
    </div>
	<br><br>
	</div>
		@endif	
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
	
	$(document).ready(function(){  
    $("#submitBtn").click(function(e){ 
	    e.preventDefault();
        var totalSesiones = $("input[name='TotalSesiones[]']").map(function(){return $(this).val();}).get().join();	   
        var descProducts = $("input[name='descItem[]']").map(function(){return $(this).val();}).get().join();
		var _totalSesion_ = totalSesiones.split(",");
		var TotalSesion = null;
		for (x=0; x < _totalSesion_.length ;x++) { TotalSesion = (TotalSesion + Number(_totalSesion_[x])); }			
	    document.getElementById("descProducts").value = descProducts;
	    $.get("{!!URL::to('/saveProduct')!!}", {
			    id_user: '{{ Auth::user()->id }}',
				description: descProducts,
				state_pol: 'En Espera',				
                ref_code: '{{ isset($refCode)? $refCode : '' }}',
				signature: '{{ (env('MODE_TEST_PAYU') == true)? isset($signHASH)?$signHASH:'' : isset($signHASH)?$signHASH:'' }}',
				value: '{{ isset($amount)? $amount : '' }}',
				Tsesiones: TotalSesion
            }, function (data, status) {
				if (data == "insert_ok") {	
				  $("#formPayU").submit(); // Submit the form
				}			
			});				
	});
    });
		
	function listqtyUpdate(id) {
		var listqty = document.getElementById("listqty_"+id);
		var qty = listqty.options[listqty.selectedIndex].value; 
		window.location = "./update-to-cart/"+id+'/'+qty;
	}; 
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
