@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebar')
@endsection

@section('content_body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Creación De Ejercicios:</span></div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">
                                    <a href="{{ url('/modulos/exercises') }}">
                                        <button type="button" rel="tooltip" title="Regresar"
                                                class="btn btn-warning btn-round btn-just-icon">
                                            <i class="material-icons">arrow_back</i>
                                        </button>
                                    </a>
                                    <br/>
                                    <br/>
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif


                                    {!! Form::open(['url' => '/modulos/exercises', 'class' => 'form', 'files' => true]) !!}

                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::hidden('created_user', Auth::user()->username, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    @include ('modulos.exercises.form')

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