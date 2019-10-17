<div class="form-group {{ $errors->has('id_history') ? 'has-error' : ''}}">
    {!! Form::label('id_history', 'Id History', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_history', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_history', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_exercice') ? 'has-error' : ''}}">
    {!! Form::label('id_exercice', 'Id Exercice', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_exercise', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_exercise', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('observation') ? 'has-error' : ''}}">
    {!! Form::label('observation', 'Observation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('observation', null, ['class' => 'form-control']) !!}
        {!! $errors->first('observation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    {!! Form::label('duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('duration', null, ['class' => 'form-control']) !!}
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('session') ? 'has-error' : ''}}">
    {!! Form::label('session', 'Session', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('session', null, ['class' => 'form-control']) !!}
        {!! $errors->first('session', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('frequency') ? 'has-error' : ''}}">
    {!! Form::label('frequency', 'Frequency', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('frequency', ['$frequency'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('frequency', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('screen') ? 'has-error' : ''}}">
    {!! Form::label('screen', 'Screen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('screen', ['$screen'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('screen', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('screen_left') ? 'has-error' : ''}}">
    {!! Form::label('screen_left', 'Screen Left', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('screen_left', ['$screen_left'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('screen_left', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('screen_right') ? 'has-error' : ''}}">
    {!! Form::label('screen_right', 'Screen Right', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('screen_right', ['$screen_right'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('screen_right', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('status', ['$status'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
