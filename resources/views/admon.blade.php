@extends('layouts.admon')

@section('content')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="active">
                <a href="{{ route('home') }}">
                    <i class="material-icons">domain</i>
                    <p>Empresas</p>
                </a>
            </li>
            <li>
                <a href="user.html">
                    <i class="material-icons">local_hospital</i>
                    <p>Centros Medicos</p>
                </a>
            </li>
            <li>
                <a href="table.html">
                    <i class="material-icons">group</i>
                    <p>Medicos</p>
                </a>
            </li>
            <li>
                <a href="typography.html">
                    <i class="material-icons">wc</i>
                    <p>Pacientes</p>
                </a>
            </li>
            <li>
                <a href="icons.html">
                    <i class="material-icons">person</i>
                    <p>Usuarios</p>
                </a>
            </li>
        </ul>
    </div>
@endsection
