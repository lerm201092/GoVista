{!! Form::hidden('id', null, ['class' => '','disabled' ]) !!}
{!! Form::hidden('id_appointment', isset($id_appointment) ? $id_appointment : null, ['class' => '']) !!}
{!! Form::hidden('id_patient', isset($id_patient) ? $id_patient : null, ['class' => '']) !!}
{!! Form::hidden('id_medico', isset($id_medico) ? $id_medico : null, ['class' => '']) !!}
{!! Form::hidden('historydate', isset($historydate) ? $historydate : date("Y-m-d H:i "), ['class' => '']) !!}
{!! Form::hidden('id_centromedico', '1', ['class' => '']) !!}
{!! Form::hidden('state', 'AC', ['class' => '']) !!}
{!! Form::hidden('title', isset($title) ? $title : null, ['class' => '']) !!}
{!! Form::hidden('body', isset($body) ? $body : null, ['class' => '']) !!}

<a href="{{ url('/modulos/histories') }}">
    <button type="button" rel="tooltip" title="Regresar" class="btn btn-primary btn-sm" data-background-color="orange">
        <i class="material-icons">arrow_back</i>
    </button>
</a>

<span id="separator"> </span>
<button type="submit" value="saveContinue" id="saveContinue" name="saveContinue" class="btn btn-primary btn-sm" data-background-color="green" rel="tooltip" title="Guardar y Continuar">
    <i class="material-icons">save_alt</i>Guardar y Continuar
</button>

<button type="submit" value="saveExercise" id="saveExercise" name="saveExercise" class="btn btn-primary btn-sm" data-background-color="green" rel="tooltip" title="Guardar y Asignar Ejercicio">
    <i class="material-icons">save_alt</i>Guardar y Asignar Ejercicio
</button>

<button type="submit" value="saveAllExit" id="saveAllExit" name="saveAllExit" class="btn btn-primary btn-sm" data-background-color="green" rel="tooltip" title="Finalizar">
    <i class="material-icons">save_alt</i>Finalizar
</button>

<!-- begin: Nav tabs -->
<span class="form-group label-floating"> <input id="tabIDHistory" name="tabIDHistory" type="hidden" /> </span> <!-- default: tabIDHistory -->
<ul id="main-tabs" class="nav nav-tabs" role="tablist" data-background-color="purple">
    <li id="1" style="text-align: center !important;">
        <a data-id="1" href="#tab_1" role="tab" data-toggle="tab"> Antecedentes <br> Medicos </a>
    </li>

    <li id="2" style="text-align: center !important;">
        <a data-id="2" href="#tab_2" role="tab" data-toggle="tab"> Anamnesis <br>&nbsp; </a>
    </li>

    <li id="3" style="text-align: center !important;">
        <a data-id="3" href="#tab_3" role="tab" data-toggle="tab"> Agudeza Visual <br> (AV) </a>
    </li>

    <li id="4" style="text-align: center !important;">
        <a data-id="4" href="#tab_4" role="tab" data-toggle="tab"> Funcional <br> optometría </a>
    </li>

    <li id="5" style="text-align: center !important;">
        <a data-id="5" href="#tab_5" role="tab" data-toggle="tab"> Motilidad <br> Ocular </a>
    </li>

    <li id="6" style="text-align: center !important;">
        <a data-id="6" href="#tab_6" role="tab" data-toggle="tab"> Diagnostico <br>&nbsp; </a>
    </li>

    <li id="7" style="text-align: center !important;">
        <a data-id="7" href="#tab_7" role="tab" data-toggle="tab"> Asignar Ejercicios </a>
    </li>
</ul>
<!-- end: Nav tabs -->

<div class="tab-content"> <!-- begin: Tab Content -->

    <!-- Tab #1 -->
	@include ('modulos.histories.tabs.tab1')
	
    <!-- Tab #2 -->
	@include ('modulos.histories.tabs.tab2')

    <!-- Tab #3 -->
	@include ('modulos.histories.tabs.tab3')

    <!-- Tab #4 -->
	@include ('modulos.histories.tabs.tab4')
	
	<!-- Tab #5 -->
	@include ('modulos.histories.tabs.tab5')
    
    <!-- Tab #6 -->
	@include ('modulos.histories.tabs.tab6')
    
    <!-- Tab #7 -->
	@include ('modulos.histories.tabs.tab7')

</div> <!-- end: Tab Content -->

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {	
	 @if (Session::has('tabIDHistory')) 
     @php $tabID = strtolower(Session::get('tabIDHistory')) @endphp
     var itemTab = {{ $tabID = ($tabID == 7)? $tabID : ($tabID+1) }};
	 $('#main-tabs li:eq('+ (itemTab-1) +") a").tab('show');
     @else
     $('#main-tabs li:eq(0) a').tab('show');
     @endif
    });
	
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {   
    var idTab = $(this).data("id");
	document.getElementById("tabIDHistory").value = idTab;    
    }); 
</script>
@endsection