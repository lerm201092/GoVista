<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Nombre</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">E-mail</label>
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group label-floating">
    <label class="control-label">Mensaje</label>
    {!! Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required','rows'=>'4']) !!}
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Enviar', ['class' => 'btn btn-primary btn-raised']) !!}
    </div>
</div>