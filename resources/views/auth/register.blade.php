@extends('layouts.newinicio')

@section('content')

<br> 
<div class="container">

	<div id="modalMain" style="position: absolute;top: 0;left: 0;right: 0;margin: 0 auto;z-index: 111 !important;display:none;padding: 15px !important;">
	<div style="color: black !important;" id="alertUI">        
		<div class="row" style="text-align: center !important;">
	    <div class="col-md-12" style="text-align: center !important;">
		      <br><br>
              <center>
                <embed id="termsprivacy" src="./terms/Terminos_Y_Condiciones.pdf" width="960" height="640" type="application/pdf"> 
              </center>								
			 <button type="button" class="btn btn-success btn-md" onclick="document.getElementById('modalMain').style.display='none';document.getElementById('registerUI').style.display='block';">CERRAR</button>
		</div>
	    </div>
    </div>
    </div>
	
	<form class="form-horizontal" method="POST" action="{{ route('register') }}" id="registerForm" role="form" data-toggle="validator" accept-charset="utf-8">
                        {{ csrf_field() }}
					<br> 
    <div style="position:relative !important;" id="registerUI" class="row">
        	
		
		@if ($errors->any())
        @foreach ($errors->all() as $error)      
	    <div class="alert alert-danger"> {{ $error }} </div>
        @endforeach
        @endif		
		
            <div class="card">  
               <div class="panel-heading" style="background: #9c27b0 !important;color: white !important;">
			  <h3 style="text-transform: uppercase !important;">Registro de nuevo usuario</h3>
			  <h6>Crea una nueva cuenta de usuario en el sistema</h6> 
			  </div>
			  
                <div style="padding: 1px !important;" class="panel-body">
			
			<div class="container-fluid">
			
  <div id="smartwizard"> 			
  
    <ul>
        <li><a href="#step-1"><span style="color: black !important;"><i class="material-icons">person</i></span><br /><small style="color: black !important;">Datos Personales</small></a></li>
        <li><a href="#step-2"><span style="color: black !important;"><i class="material-icons">security</i></span><br /><small style="color: black !important;">Usuario y Contraseña</small></a></li>
    </ul>
  
  <div id="stepsSmartWizard">
      <div id="step-1" class="">
        	 <!-- begin step 1 -->
			 <div id="form-step-0" role="form" data-toggle="validator">
			 			 
			 <div class="row">
			 <div class="col-md-6">
			 <br>
			<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('tipodoc') ? ' has-error' : '' }} label-floating">
                            <label for="tipodoc" class="control-label">Tipo de Documento</label>
                                                            
								{!! Form::select('tipodoc', $tipo_documento, null, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                {!! $errors->first('tipodoc', '<p class="help-block">:message</p>') !!}								
                            </div>
             </div>	
			<div class="col-md-6">
			<br>
                        <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('numdoc') ? ' has-error' : '' }} label-floating">
                            <label for="numdoc" class="control-label">No. Identificación</label>
                            
                                <input id="numdoc" type="text" class="form-control" name="numdoc" value="{{ old('numdoc') }}" required>
                                @if ($errors->has('numdoc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numdoc') }}</strong>
                                    </span>
                                @endif
                            </div>
             </div>
			</div>
			
			<div class="row">
			   <div class="col-md-6">
												<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('nombre1') ? ' has-error' : '' }} label-floating">
                            <label for="nombre1" class="control-label">Primer Nombre</label>
                         <input id="nombre1" type="text" class="form-control" name="nombre1" value="{{ old('nombre1') }}" required>
                                @if ($errors->has('nombre1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="col-md-6">
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('nombre2') ? ' has-error' : '' }} label-floating">
                            <label for="nombre2" class="control-label">Segundo Nombre</label>
                            <input id="nombre2" type="text" class="form-control" name="nombre2" value="{{ old('nombre2') }}">
                                @if ($errors->has('nombre2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			</div>
						
						<div class="row">
						<div class="col-md-6">
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('apellido1') ? ' has-error' : '' }} label-floating">
                            <label for="apellido1" class="control-label">Primer Apellido</label>
                            <input id="apellido1" type="text" class="form-control" name="apellido1" value="{{ old('apellido1') }}" required>
                                @if ($errors->has('apellido1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>		
                        <div class="col-md-6">						
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('apellido2') ? ' has-error' : '' }} label-floating">
                            <label for="apellido2" class="control-label">Segundo Apellido</label>
                            <input id="apellido2" type="text" class="form-control" name="apellido2" value="{{ old('apellido2') }}">
                                @if ($errors->has('apellido2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>						
						</div>
						
						<div class="row">
						<div class="col-md-6">
						<br>
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }} label-floating">
                            <label for="sexo" class="control-label">Género</label>
								<select class="form-control" name="sexo" id="sexo" required>
								<option value="" selected disabled></option>
								<option value="M">Masculino</option>								
								<option value="F">Femenino</option>	
						        </select>    
                            </div>
                        </div>		
                        <div class="col-md-6">	
                        <br>							
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }} label-floating">
                            <label for="birthdate" class="control-label">Fecha de Nacimiento</label>
                            <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd">
                                    {!! Form::text('birthdate', isset($birthdate) ? $birthdate : null , ['class' => 'form-control','readonly','required']) !!}
                                    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                            </div>
                        </div>						
						</div>						
						
						<div class="row">
						<div class="col-md-6">
						<br>
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('address') ? ' has-error' : '' }} label-floating">
                            <label for="address" class="control-label">Dirección</label>
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="col-md-6">
						<br>
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('movil') ? ' has-error' : '' }} label-floating">
                            <label for="movil" class="control-label">Teléfono</label>
                                <input id="movil" type="text" class="form-control" name="movil" value="{{ old('movil') }}" required>
                                @if ($errors->has('movil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('movil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						 </div>
						
						<div class="row">
						<div class="col-md-4">
						<br>
						 <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('email') ? ' has-error' : '' }} label-floating">
                            <label for="email" class="control-label">E-Mail</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>		
                        <div class="col-md-4">	
                        <br>						
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('dpto_cmb') ? ' has-error' : '' }} label-floating">
                            <label for="dpto_cmb" class="control-label">Departamento</label>
								<select class="form-control" name="dpto_cmb" id="dpto_cmb" required>								
								@foreach($areas_dpto as $area_sel)
								@if($area_sel->id==$area_sel->id_dpto)
									<option value="{{$area_sel->id}}">{{$area_sel->nomarea}}</option>
								@else
								<option value="{{$area_sel->id}}">{{$area_sel->nomarea}}</option>
								@endif
								@endforeach
						        </select>                           
                            </div>
                        </div>
						<div class="col-md-4">
						<br>
						<div id="div_municipio" name="div_municipio" style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('id_area') ? ' has-error' : '' }} label-floating">
                            <label for="id_area" class="control-label">Municipio</label>							 
								{!! Form::select('id_area', $areas_munic, null, ['class' => 'form-control', 'required', 'autofocus']) !!}
                                {!! $errors->first('id_area', '<p class="help-block">:message</p>') !!}	
                            </div>
                        </div>	
						</div>

 </div>						
<!-- end step 1 -->	
      </div>
	  
      <div id="step-2" class="">
        <!-- begin step 2 -->		  
						<div id="form-step-0" role="form" data-toggle="validator">
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label style="font-size: 15px !important;color: #000 !important;" for="username" class="col-md-4 control-label">Nombre de Usuario</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group">
                            <label style="font-size: 15px !important;color: #000 !important;" for="password" class="col-md-4 control-label">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" data-toggle="password" required>
                               
                            </div>
                        </div>

                        <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group">
                            <label style="font-size: 15px !important;color: #000 !important;" for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password-confirmation" data-toggle="password" required>
								
                            </div>
                        </div>	
						
						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('perfil') ? ' has-error' : '' }}">
                            <label style="font-size: 15px !important;color: #000 !important;" for="perfil" class="col-md-4 control-label">Perfil</label>
                            <div class="col-md-6">
							     {!! Form::select('perfil', $perfil, null, ['class' => 'form-control', 'required', 'autofocus', 'id' => 'perfil']) !!}
                                 {!! $errors->first('perfil', '<p class="help-block">:message</p>') !!}	                                
                            </div>
                        </div>
						
<br>
<div class="panel panel-default">
<div style="text-transform:uppercase !important;background-color:#9c27b0 !important;color:white !important;" class="panel-heading">Datos de Afiliación:</div>
  <div class="panel-body">
        <div class="row">
		 <br>
		 <div class="col-md-4">	
                        <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }} label-floating">
                            <label for="empresa" class="control-label">Empresa</label>
                           	<select class="form-control" id="empresa" name="empresa" required>
							  <option value=""></option>
                                @foreach ($listaEmpresas as $listaEmpresas_ejeKey => $listaEmpresasValue)
                                    <option value="{{ $listaEmpresas_ejeKey }}">{{$listaEmpresasValue}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('empresa', '<p class="help-block">:message</p>') !!}								
                            </div>
                        </div>							
						
						<div id="tablaAfiliacion" style="display: none;">
						<div class="col-md-4">	
                        <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('eps') ? ' has-error' : '' }} label-floating">
                            <label for="eps" class="control-label">EPS</label>
							<select class="form-control" id="eps" name="eps" required>
							<option value=""></option>
                                @foreach ($entidades_eps as $entidades_eps_ejeKey => $entidades_epsValue)
                                    <option value="{{ $entidades_eps_ejeKey }}">{{$entidades_epsValue}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('eps', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>	
						
						<div class="col-md-4">	
                        <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group{{ $errors->has('carnet') ? ' has-error' : '' }} label-floating">
                            <label for="carnet" class="control-label">No. Carnet</label>
                           	<input type="text" class="form-control" id="carnet" name="carnet" value="{{ old('carnet') }}" required>
                                @if ($errors->has('carnet'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carnet') }}</strong>
                                    </span>
                                @endif								
                            </div>
                        </div>	
                        </div>					
 </div>		
 </div>	
 </div>	 
 

						<div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group">
                            <div class="col-md-8 col-md-offset-4">
							<br>
							<p><input type="checkbox" id="TermsPrivacy" name="TermsPrivacy" required>&nbsp;&nbsp;Acepto los&nbsp;<a onclick="javascript:document.getElementById('registerUI').style.display='none';document.getElementById('modalMain').style.display = 'block';" href="javascript:void(0);">términos y condiciones</a>&nbsp;del sitio&#46;</p>
						    </div>
						</div>
						
						</div>
						
						 <div style="padding-bottom: 0px !important;margin: 0 !important;" class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                  <button type="submit" class="btn btn-primary">
                                    Registrar
                                  </button>
                            </div>							
                        </div>
						<br>
						
		  <!-- end step 2 -->	
      </div>      
  </div>
</div>

	  	    <div> 
			    <button onclick="javascript:window.location='{{ route('login') }}';" type="button" class="btn btn-primary btn-sm"><i class="material-icons">settings_power</i>Salir</button>
				&nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary btn-sm" id="prev-btn-smartwizard" type="button"><i class="material-icons">keyboard_arrow_left</i>Atras</button>
				&nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary btn-sm" id="next-btn-smartwizard" type="button"><i class="material-icons">keyboard_arrow_right</i>Siguiente</button>
           </div>	

  
</div> 							
                       
                    </form>
                </div>
            </div> 
        
    </div>
</div>

    <!-- Put icon see password in input -->
	<script src="{{ asset('assets/js/bootstrap-show-password.min.js') }}" type="text/javascript"></script>	
	<script type="text/javascript">
	$("#password").password('toggle');	
	$("#password-confirm").password('toggle');
    </script>
	
	<!-- Alert message -->	
	<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
	}, 3000);
	</script>
	
	<style>
    .sw-theme-dots > ul.step-anchor {   
		width: 80% !important;
    }
	.btn-toolbar > .btn, .btn-toolbar > .btn-group, .btn-toolbar > .input-group {    
		display: none !important;
	}
	.sw-theme-dots > ul.step-anchor::before {  
		background-color: #428bca !important;
		border: 1px solid #428bca !important;
    }
	</style>

@endsection

@section('scripts')

    <script>	
    $( document ).ready(function() {		
  	        $('#smartwizard').smartWizard({ selected: 0, theme: 'dots', transitionEffect:'fade', });
	
	        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 1){					
                    $('#finish-btn-smartwizard').removeClass('disabled');
                }else {				
                   $('.btn-finish').addClass('disabled');
                }
            });

            $("#prev-btn-smartwizard").on("click", function() {                
                $('#smartwizard').smartWizard("prev");
                return true;
            });
            $("#next-btn-smartwizard").on("click", function() {                
                $('#smartwizard').smartWizard("next");
                return true;
            });			
    });
   </script>	
    
    <script type="text/javascript">
	
	    $("#perfil").change(function () {  
         var valuePerfil = document.getElementById("perfil").value;		
		 if (valuePerfil.includes("5")) { // id=5 (Paciente)
			 document.getElementById("tablaAfiliacion").style.display = "block"; 
			 document.getElementById("empresa").required = true;
			 document.getElementById("eps").required = true;
			 document.getElementById("carnet").required = true;
			 document.getElementById("empresa").selectedIndex = "0";
			 document.getElementById("eps").selectedIndex = "0";
			 document.getElementById("carnet").selectedIndex = "0";
		 } else {
			 document.getElementById("tablaAfiliacion").style.display = "none"; 
			 document.getElementById("empresa").required = true;
			 document.getElementById("eps").required = false;
			 document.getElementById("carnet").required = false;
			 document.getElementById("empresa").selectedIndex = "0";
			 document.getElementById("eps").selectedIndex = "0";
			 document.getElementById("carnet").selectedIndex = "0";
		 }		
        });  
	
		$('.form_date').datetimepicker({
            language:  'es',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });				
	  
        $(document).ready(function () {	  		
            $('#dpto_cmb').change(function () {
                var cat_id = $(this).val();
                var div = $(this).parent();
                var op = '<label for="id_area" class="control-label">Municipio</label>';							
                op += '<select class="form-control" name="id_area" id="id_area">';
                $.ajax({
                    type: 'GET',
                    url: '{!!URL::to('/findAreas')!!}',
                    data: {'id': cat_id},
                    dataType: 'json',
                    success: function (data) {
                        op += '<option value="" selected disabled>Seleccione Area</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nomarea + '</option>';
                        }
                        op += '</select>';
                        $("#div_municipio").empty();
                        $("#div_municipio").append(op);
                    }
                });
            });
        });
    </script>
@endsection