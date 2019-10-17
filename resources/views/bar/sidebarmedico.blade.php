<div class="sidebar" data-color="purple" data-image="{{ asset( 'assets/img/sidebar-1.jpg') }}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo" style="text-align: center !important;">
	  <img src="/apps/img/logo-go-vista-png-150x50.png" width="150" height="50" /> 
    <div style="text-align:center !important;text-transform:uppercase !important;font-weight:bold !important;color:black !important;" id="roluser">
	@if(Auth::user()->roluser == 1  )
		<span>Admnistrador</span>
	@endif
	@if(Auth::user()->roluser == 2  )
		<span>Admon. Medico</span>
	@endif
	@if(Auth::user()->roluser == 3  )
		<span>Medico</span>
	@endif
	@if(Auth::user()->roluser == 4  )
		<span>Paciente</span>
	@endif
	</div>  
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
                <li class="{{ $menu_bar[0] }}">
                    <a href="{{url('/summary')}}">
                        <i class="material-icons">insert_drive_file</i>
                        <p>Resumen</p>
                    </a>
                </li>
            @if(Auth::user()->roluser<>4  )
                <li class="{{ $menu_bar[1] }}">
                    <a href="{{url('/modulos/patients')}}">
                        <i class="material-icons">group</i>
                        <p>Pacientes</p>
                    </a>
                </li>
            @endif
            <li class="{{ $menu_bar[2] }}">
                <a href="{{url('/modulos/appointments')}}">
                    <i class="material-icons">date_range</i>
                    <p>Citas</p>
                </a>
            </li>
            @if(Auth::user()->roluser<>4  )
                <li class="{{ $menu_bar[3] }}">
                    <a href="{{url('/modulos/histories')}}">
                        <i class="material-icons">recent_actors</i>
                        <p>Historias Clínicas</p>
                    </a>
                </li>
            @endif

            @if(Auth::user()->roluser==4 || Auth::user()->roluser==3)
                <li class="{{ $menu_bar[4] }}">
                    <a href="{{url('/modulos/history_exercises')}}">
                        <i class="material-icons">fitness_center</i>
                        <p>Ejercicios</p>
                    </a>
                </li>
            @endif
            @if(Auth::user()->roluser==1)
                <li>
                    <a href="{{url('/modulos/empresas')}}">
                        <i class="material-icons">arrow_forward</i>
                        <p>Módulo Administración</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
