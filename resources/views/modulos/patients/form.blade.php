<!-- begin: Nav tabs -->
<ul class="nav nav-tabs" role="tablist" data-background-color="purple">
    <li style="text-align: center !important;" class="active">
        <a href="#tab_1" role="tab" data-toggle="tab"> <i class="material-icons">perm_identity</i> Datos Personales </a>
    </li>
    <li style="text-align: center !important;">	           
        <a href="#tab_2" role="tab" data-toggle="tab"> <i class="material-icons">today</i> Afiliación </a>
    </li>
	<li style="text-align: center !important;">
        <a href="#tab_3" role="tab" data-toggle="tab"> <i class="material-icons">place</i> Contacto </a>
    </li>

    <li style="text-align: center !important;">
        <a href="#tab_4" role="tab" data-toggle="tab"> <i class="material-icons">contacts</i> Contacto de Emergencia </a>
    </li>

    <li style="text-align: center !important;">
        <a href="#tab_5" role="tab" data-toggle="tab"> <i class="material-icons">wc</i> Datos Padres </a>
    </li>
</ul>
<!-- end: Nav tabs -->

<div style="height: 410px !important;" class="tab-content"> <!-- begin: Tab Content -->

    <!-- Tab #1 -->
	@include ('modulos.patients.tabs.tab1')
	
	<!-- Tab #2 -->
	@include ('modulos.patients.tabs.tab2')
	
	<!-- Tab #3 -->
	@include ('modulos.patients.tabs.tab3')
	
	<!-- Tab #4 -->
	@include ('modulos.patients.tabs.tab4')
	
	<!-- Tab #5 -->
	@include ('modulos.patients.tabs.tab5')

</div> <!-- end: Tab Content -->           

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']) !!} 	
</div>

