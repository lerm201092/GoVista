@extends('layouts.admon')

<!-- SideBar  -->
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
  <div class="card">    	
    <div class="card-content">    
	<div class="card-content table-responsive">
		
	<div class="row">
	<div class="col-md-12">
	
	@if(Auth::user()->roluser == 3)
	 <div class="row">
	 <div class="col-lg-3 col-md-6 col-sm-6">	
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Citas Activas</p>
                        <h3 class="title">{{ $totalCitasActivas }}</h3>
                    </div>                   
                </div>
            </div>			
			 <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">group</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Pacientes</p>
                        <h3 class="title">{{ $totalPacientes }}</h3>
                    </div>                   
                </div>
            </div>	
             <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">group</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pacientes Inactivos</p>
                        <h3 class="title">{{ $pacientesInactivos }}</h3>
                    </div>                   
                </div>
            </div>			
			 <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">group</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pacientes Activos</p>
                        <h3 class="title">{{ $pacientesActivos }}</h3>
                    </div>                   
                </div>
            </div>	
			 </div>
	 
	 <div class="row">
	 <div class="col-lg-3 col-md-6 col-sm-6">	
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Asignados</p>
                        <h3 class="title">{{ $totalEjerciciosAsignados }}</h3>
                    </div>                   
                </div>
            </div>			
			 <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Activos</p>
                        <h3 class="title">{{ $totalEjerciciosActivos }}</h3>
                    </div>                   
                </div>
            </div>	
             <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Incumplidos</p>
                        <h3 class="title">{{ $totalEjerciciosIncumplidos }}</h3>
                    </div>                   
                </div>
            </div>			
			 <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Realizados</p>
                        <h3 class="title">{{ $totalEjerciciosRealizados }}</h3>
                    </div>                   
                </div>
            </div>           			
			 </div>	 
			 @endif

    <!-- begin: Chart Medico -->
	@if(Auth::user()->roluser == 3)
    <div id="chartMain" class="row">
            <div class="col-md-4 col-md-offset-1">                   
               <div class="ct-chart ct-square" id="Chart_1"></div>
	</div>
	<div class="col-md-4 col-md-offset-1">                  
               <div class="ct-chart ct-square" id="Chart_2"></div>
	</div>	
    </div>
	@endif
	<!-- end: Chart Medico -->
	
	@if(Auth::user()->roluser == 4)
		<div class="row">
	 <div class="col-lg-3 col-md-6 col-sm-6">	
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Citas Activas</p>
                        <h3 class="title">{{ $totalCitasActivas }}</h3>
                    </div>                   
                </div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Consultas Médicas</p>
                        <h3 class="title">{{ $qty_citas[0]->qty }}</h3>
                    </div>                   
                </div>
				</div>
				 <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Citas Inactivas</p>
                        <h3 class="title">{{ $totalCitasInactivas }}</h3>
                    </div>                   
                </div>
				</div>
				 <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">date_range</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Citas Realizadas</p>
                        <h3 class="title">{{ $totalCitasRealizadas }}</h3>
                    </div>                   
                </div>
				</div>				
				</div>
				
				<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">	
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Asignados</p>
                        <h3 class="title">{{ $totalEjerciciosAsignados }}</h3>
                    </div>                   
                </div>
				</div>
				 <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Activos</p>
                        <h3 class="title">{{ (isset( $qty_exe['AC'])) ? $qty_exe['AC'] : 0}}</h3>
                    </div>                   
                </div>
				</div>
				 <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Incumplidos</p>
                        <h3 class="title">{{(isset( $qty_exe['IN'])) ? $qty_exe['IN'] : 0 }}</h3>
                    </div>                   
                </div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">done_all</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Ejercicios Realizados</p>
                        <h3 class="title">{{ (isset( $qty_exe['OK'])) ? $qty_exe['OK'] : 0 }}</h3>
                    </div>                   
                </div>
				</div>
				</div>
	@endif
	<!-- begin: Chart Paciente -->
	@if(Auth::user()->roluser == 4)
    <div id="chartMain" class="row">
            <div class="col-md-4 col-md-offset-1">                   
               <div class="ct-chart ct-square" id="Chart_1"></div>
	</div>
	<div class="col-md-4 col-md-offset-1">                  
               <div class="ct-chart ct-square" id="Chart_2"></div>
	</div>	
    </div>
	@endif	
	<!-- end: Chart Paciente -->
	
	</div>
	</div>	

</div> 
</div>
</div>  
</div>  

<style>
.ct-series-a .ct-line,
.ct-series-a .ct-point {
  stroke: #9c27b0;
}


.ct-label.ct-horizontal.ct-end {
    color: black !important;
    font-weight: bold !important;
}
.ct-label.ct-vertical.ct-start {
    color: black !important;
    font-weight: bold !important;
}
.ct-axis-title {
    color: black !important;
    font-weight: bold !important;
}
</style>

@endsection

@section('scripts')

    <script type="text/javascript">
	
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
			@if(Auth::user()->roluser == 3)
            initCharts_Medico();
		    @endif
			@if(Auth::user()->roluser == 4)
            initCharts_Paciente();
		    @endif
        });
        
        @if(Auth::user()->roluser == 3)		
        function initCharts_Medico() {
			
		var Chart_1 = new Chartist.Line('#Chart_1', {
			labels: ['<br>Citas<br>Activas', 'Total<br>Pacientes', 'Pacientes<br>Activos', 'Pacientes<br>Inactivos'],
			series: [
				[ {{ $totalCitasActivas }}, {{ $totalPacientes }}, {{ $pacientesActivos }}, {{ $pacientesInactivos }}]
			]
		}, {
		low: 1,	
		showArea: false,
		showPoint: true,
		fullWidth: false,
		axisY: { type: Chartist.AutoScaleAxis, onlyInteger: true },
			});
		Chart_1.on('draw', function(data) {
		if(data.type === 'line' || data.type === 'area') {
			data.element.animate({
		d: {
        begin: 2000 * data.index,
        dur: 2000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
		}
		});
		}
		});

        var Chart_2 = new Chartist.Line('#Chart_2', {
			labels: ['Total Ejercicios Asignados', 'Total Ejercicios Activos', 'Total Ejercicios Incumplidos', 'Total Ejercicios Realizados'],
			series: [
				[ {{ $totalEjerciciosAsignados }}, {{ $totalEjerciciosActivos }}, {{ $totalEjerciciosIncumplidos }}, {{ $totalEjerciciosRealizados }}]
			]
		}, {
		low: 1,
		showArea: false,
		showPoint: true,
		fullWidth: false,
		axisY: { type: Chartist.AutoScaleAxis, onlyInteger: true },
			});
		Chart_2.on('draw', function(data) {
		if(data.type === 'line' || data.type === 'area') {
			data.element.animate({
		d: {
        begin: 2000 * data.index,
        dur: 2000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
		}
		});
		}
		});			
			
        };
		@endif
		
		@if(Auth::user()->roluser == 4)
		function initCharts_Paciente() {
         
		var Chart_1 = new Chartist.Line('#Chart_1', {
			labels: ['Total Citas Activas', 'Total Citas Inactivas', 'Total Citas Realizadas', 'Total Consultas Médicas'],
			series: [
				[ {{ $totalCitasActivas }}, {{ $totalCitasInactivas }}, {{ $totalCitasRealizadas }}, {{ $qty_citas[0]->qty }}]
			]
		}, {
		low: 1,	
		showArea: false,
		showPoint: true,
		fullWidth: false,
		axisY: { type: Chartist.AutoScaleAxis, onlyInteger: true },
			});
		Chart_1.on('draw', function(data) {
		if(data.type === 'line' || data.type === 'area') {
			data.element.animate({
		d: {
        begin: 2000 * data.index,
        dur: 2000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
		}
		});
		}
		});
		
		var Chart_2 = new Chartist.Line('#Chart_2', {
			labels: ['Total Ejercicios Asignados', 'Total Ejercicios Activos', 'Total Ejercicios Incumplidos', 'Total Ejercicios Realizados'],
			series: [
				[ {{ $totalEjerciciosAsignados }}, {{ (isset( $qty_exe['AC'])) ? $qty_exe['AC'] : 0}}, {{(isset( $qty_exe['IN'])) ? $qty_exe['IN'] : 0 }}, {{ (isset( $qty_exe['OK'])) ? $qty_exe['OK'] : 0 }}]
			]
		}, {
		low: 1,	
		showArea: false,
		showPoint: true,
		fullWidth: false,
		axisY: { type: Chartist.AutoScaleAxis, onlyInteger: true },
			});
		Chart_2.on('draw', function(data) {
		if(data.type === 'line' || data.type === 'area') {
			data.element.animate({
		d: {
        begin: 2000 * data.index,
        dur: 2000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
		}
		});
		}
		});	
			
		};
		@endif
		
    </script>
@endsection