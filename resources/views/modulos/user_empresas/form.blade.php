<div class="form-group {{ $errors->has('id_user') ? 'has-error' : ''}}">
    {!! Form::label('id_user', 'Id User', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_user', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_empresa') ? 'has-error' : ''}}">
    {!! Form::label('id_empresa', 'Id Empresa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_empresa', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_empresa', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    {!! Form::label('state', 'State', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('state', ['Activo', 'Inactivo'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
