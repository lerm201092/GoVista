@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User_empresa #{{ $user_empresa->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/modulos/user_empresas') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($user_empresa, [
                            'method' => 'PATCH',
                            'url' => ['/modulos/user_empresas', $user_empresa->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('modulos.user_empresas.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
