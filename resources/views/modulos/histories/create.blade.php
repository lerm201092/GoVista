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
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Creación</h4>
                        <p class="category">Creación de Consulta Médica</p>
                    </div>
					<div class="well well-sm"><span class="titlePage">Listado de las Historias Clínicas registradas:</span></div>
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
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    {!! Form::open(['url' => '/modulos/histories', 'class' => 'form', 'files' => true]) !!}
                                        @include ('modulos.histories.form')
                                        {!! Form::hidden('created_user', Auth::user()->username, null, ['class' => 'form-control']) !!}
                                        {!! Form::hidden('id_empresa', $id_empresa, null, ['class' => 'form-control']) !!}
                                        {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
