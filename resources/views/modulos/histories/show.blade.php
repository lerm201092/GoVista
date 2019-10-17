@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebarmedico')
@endsection

@section('content_body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                  
                    <div class="well well-sm"><span class="titlePage">Ver Información de Consulta Médica:</span></div>                   
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">
                                   <a href="{{ url('/modulos/histories') }}">
                                        <button type="button" rel="tooltip" title="Regresar"
                                                class="btn btn-warning btn-round btn-just-icon">
                                            <i class="material-icons">arrow_back</i>
                                        </button>
                                    </a>
                                   <!-- begin: Nav tabs -->
<ul id="main-tabs" class="nav nav-tabs" role="tablist" data-background-color="purple">
    <li id="1" style="text-align: center !important;" class="active">
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
	@include ('modulos.histories.tabs_show.tab1')
	
    <!-- Tab #2 -->
	@include ('modulos.histories.tabs_show.tab2')

    <!-- Tab #3 -->
	@include ('modulos.histories.tabs_show.tab3')

    <!-- Tab #4 -->
	@include ('modulos.histories.tabs_show.tab4')
	
	<!-- Tab #5 -->
	@include ('modulos.histories.tabs_show.tab5')
    
    <!-- Tab #6 -->
	@include ('modulos.histories.tabs_show.tab6')
    
    <!-- Tab #7 -->
	@include ('modulos.histories.tabs_show.tab7')

</div> <!-- end: Tab Content -->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

