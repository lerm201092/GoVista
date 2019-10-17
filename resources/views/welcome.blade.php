@extends('layouts.inicio')

@section('content')
        <div class="collapse navbar-collapse" id="navigation-index">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <i class="material-icons">dashboard</i> Components
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons" >settings</i>
                        Settings
                    </a>
                </li>
                @if (Auth::check())
                    <li>
                        <a href="{{ url('/home') }}"><i class="material-icons">person</i>Home</a>
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
