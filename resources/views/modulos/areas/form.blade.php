<div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    {!! Form::label('id', 'Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('id_tipo') ? 'has-error' : ''}}">
    {!! Form::label('id_tipo', 'Id Tipo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_tipo',  array('0' => 'Continente','1' => 'Pais', '2' => 'Departamento', '3' => 'Municipio'), null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('padre') ? 'has-error' : ''}}">
    {!! Form::label('padre', 'Padre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6" id="padre_cmb" name="padre_cmb">
        <select class="form-control" name="padre" id="padre">
            @foreach($areas as $area_sel)
                @if(isset($area))
                    @if($area->padre==$area_sel->id)
                        <option value="{{$area_sel->id}}" selected>{{$area_sel->nomarea}}</option>
                    @else
                        <option value="{{$area_sel->id}}">{{$area_sel->nomarea}}</option>
                    @endif
                @else
                    <option value="{{$area_sel->id}}">{{$area_sel->nomarea}}</option>
                @endif
            @endforeach
        </select>
        {!! $errors->first('padre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('codarea') ? 'has-error' : ''}}">
    {!! Form::label('codarea', 'Codarea', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('codarea', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('codarea', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('nomarea') ? 'has-error' : ''}}">
    {!! Form::label('nomarea', 'Nomarea', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomarea', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nomarea', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
