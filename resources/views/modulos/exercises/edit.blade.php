@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebar');
@endsection

@section('content_body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Actualización:</span></div>                  
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

                                    {!! Form::model($exercise, [
                                        'method' => 'PATCH',
                                        'url' => ['/modulos/exercises', $exercise->id],
                                        'class' => 'form',
                                        'files' => true
                                    ]) !!}
                                    {!! Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']) !!}
                                    @include ('modulos.exercises.form', ['submitButtonText' => 'Actualizar'])
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
