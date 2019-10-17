@extends('layouts.newinicio')

@section('content')
    <div class="collapse navbar-collapse" id="navigation-index">
        <ul class="nav navbar-nav navbar-right">

            @if (Auth::check())
                <li>
                <!--<a href="{{ url('/home') }}"><i class="material-icons">person</i>Home</a>-->

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="material-icons">person</i>
                        {{ Auth::user()->nombres.' '.Auth::user()->apellidos }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            @if(Auth::user()->roluser==1)
                                <a href="{{url('/modulos/empresas')}}">Ingreso al Sistema</a>
                            @endif
                            @if(Auth::user()->roluser==2)
                                <a href="{{url('/modulos/patients')}}">Ingreso al Sistema</a>
                            @endif
                            @if(Auth::user()->roluser==3)
                                <a href="{{url('/modulos/patients')}}">Ingreso al Sistema</a>
                            @endif
                            @if(Auth::user()->roluser==4)
                                <a href="{{url('/modulos/history_exercises')}}">Ingreso al Sistema</a>
                            @endif
                        </li>

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>


                </li>
            @else
                <li>
                    <a href="#" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">person</i>Iniciar Sesión</a>
                </li>
            @endif
        </ul>
    </div>
@endsection
