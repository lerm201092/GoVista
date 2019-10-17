<div class="row">   
    <div class="col-md-12">
        <div class="form-group label-floating">
            <label class="control-label">Descripción</label>
            {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="form-group label-floating">
            <label class="control-label">Observaciones</label>
            {!! Form::textarea('observation', null, ['class' => 'form-control', 'required' => 'required','rows' =>'1']) !!}
            {!! $errors->first('observation', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group label-floating">
            <label class="control-label">Estado</label>
            {!! Form::select('state',  $estados , null, ['class' => 'form-control']) !!}
            {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']) !!}
    <div class="clearfix"></div>
</div>
