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
					<div class="well well-sm"><span class="titlePage">Tienda GoVista:</span></div>
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
  <div class="row">
  @foreach($products as $product)
                <div class="col-md-4">
                    <div class="thumbnail">
					
					<div style="position: relative;text-align: center;color: white;">
   <img style="width: 200px !important;height: 200px !important;" src="{{ asset('img/products/'.$product->item) }}.jpg" />
  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"><h4 style="text-transform: uppercase !important;font-weight: bold !important;">Paquete De <br>{!! $product->description !!}</h4></div>
</div>

                      
                        <div style="text-align: center !important;" class="caption">
                            <h4>{{ $product->name }}</h4>
                            <h4>{{ str_limit(strtolower($product->description), 50) }}</h4>
                            <h4><strong>Precio: </strong>$ {{ number_format($product->price) }}</h4>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-primary text-center" role="button"> <i class="material-icons">shopping_cart</i>&nbsp;AÑADIR AL CARRITO</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
                 </div>                   
                                </div>
                            </div>
                        </div>
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