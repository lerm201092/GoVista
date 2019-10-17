<div class="row">    
    @if(!isset($submitButtonText))
    <div class="col-md-2">
    @else
    <div class="col-md-4">
    @endif
        <div class="form-group label-floating">
            <label class="control-label">UserName</label>
            {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    @if(!isset($submitButtonText))
        <div class="col-md-2">
            <div class="form-group label-floating">
                <label class="control-label">Password</label>
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endif

    <div class="col-md-3">
        <div class="form-group label-floating">
            <label class="control-label">Tipo Documento</label>
            {!! Form::select('tipodoc',
            array('RC' => 'Registro Civil', 'TI' => 'Tarjeta de Identidad',
            'CC' => 'Cédula de Cuidadanía', 'CE' => 'Cédula de Extranjería',
            'AS' => 'Adulto sin identificación', 'MS' => 'Menor sin identificación'), null, ['class' => 'form-control']) !!}
            {!! $errors->first('tipodoc', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label">Nro. Documento</label>
            {!! Form::text('numdoc', null, ['class' => 'form-control']) !!}
            {!! $errors->first('numdoc', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Nombres</label>
            {!! Form::text('nombres', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('nombres', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Apellidos</label>
            {!! Form::text('apellidos', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
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
            {!! Form::text('movil', null, ['class' => 'form-control']) !!}
            {!! $errors->first('movil', '<p class="help-block">:message</p>') !!}
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
            <label class="control-label">Rol</label>
            {!! Form::select('roluser', $roles_users, null, ['class' => 'form-control']) !!}
            {!! $errors->first('roluser', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
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