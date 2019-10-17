<div class="row">        
    <div class="col-md-3">
        <div class="form-group label-floating">
            <label class="control-label">Nit</label>
            {!! Form::number('nit', null, ['class' => 'form-control']) !!}
            {!! $errors->first('nit', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group label-floating">
            <label class="control-label">Nombre de Empresa</label>
            {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group label-floating">
            <label class="control-label">Dirección</label>
            {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Teléfonos</label>
            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
            {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
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
            <label class="control-label">Contacto</label>
            {!! Form::text('contacto', null, ['class' => 'form-control']) !!}
            {!! $errors->first('contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Estado</label>
            {!! Form::select('estado', $estados , null, ['class' => 'form-control']) !!}
            {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']) !!}
    <div class="clearfix"></div>
</div>