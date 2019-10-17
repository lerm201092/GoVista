<div class="row">              
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Nombre del Médico</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Asignar Empresa</label>     
                        <select style="resize: inline !important;max-width: 600px !important;width: 100% !important;height: 100px !important;overflow: auto !important;" class="form-control" name="id_empresa[]" multiple>
                           @foreach ($empresas as $itemKey => $itemValue)                                  
                           @if ( isset($user_empresas) && $user_empresas->contains($itemKey) )              
                            <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                           @else 
                            <option value="{{ $itemKey }}">{{$itemValue}}</option>
                           @endif   
                           @endforeach
                        </select>  
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Especialidad</label>
            {!! Form::text('specialty', null, ['class' => 'form-control']) !!}
            {!! $errors->first('specialty', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Dirección</label>
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Teléfonos</label>
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">E-mail</label>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Departamento</label>
            <select class="form-control" name="dpto_cmb" id="dpto_cmb">
                @foreach($areas_dpto as $area_sel)
                    @if($area_sel->id==$area_sel->id_dpto)
                        <option value="{{$area_sel->id}}" selected>{{$area_sel->nomarea}}</option>
                    @else
                        <option value="{{$area_sel->id}}">{{$area_sel->nomarea}}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('dpto_cmb', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating" id="div_municipio" name="div_municipio">
            <label class="control-label">Municipio</label>
            {!! Form::select('id_area',  $areas_munic , null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_area', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Estado</label>
            {!! Form::select('estado',  $estados , null, ['class' => 'form-control']) !!}
            {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']) !!}
    <div class="clearfix"></div>
</div>
