<div class="row">   
    <div class="form-group label-floating">
            {!! Form::hidden('id', null, ['class' => 'form-control','disabled' ]) !!}
            {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
    </div>   
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Paciente</label>
            <div class="input-group" data-toggle="modal" data-target="#ModalPatient" onclick="limpiarModalPatient();">
                {!! Form::text('name_patient', null, ['class' => 'form-control','disabled','id'=>'name_patient']) !!}
                {!! $errors->first('name_patient', '<p class="help-block">:message</p>') !!}
                <span class="input-group-addon">
                    <button type='button' rel='tooltip' title='Buscar Paciente' class='btn btn-primary btn-simple btn-xs'><i class='material-icons'>search</i></button>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Motivo de Consulta</label>
            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-7">
        <div class="form-group label-floating">
            <label class="control-label">Descripción de la Consulta</label>
            {!! Form::textarea('body', null, ['class' => 'form-control','rows'=> 3]) !!}
            {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label">Médico</label>
            {!! Form::select('id_medico', $medicos, null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('id_medico', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group label-floating">
            <label class="control-label">Fecha/Hora de Cita Inicial</label>
            <div class="input-group date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii">
                {!! Form::text('start', isset($start) ? $start : date("Y-m-d H:i ") , ['class' => 'form-control','readonly','id'=>'start']) !!}
                {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
                <span class="input-group-addon"><span class="glyphicon glyphicon-th "></span></span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Estado</label>
            {!! Form::select('state', $estado_cita, null, ['class' => 'form-control']) !!}
            {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-1">
        {!! Form::hidden('id_patient', null, ['class' => 'form-control','id'=>'id_patient','required' => 'required']) !!}
    </div>
    <div class="col-md-1">
        {!! Form::hidden('fullday', 0 , ['class' => 'form-control','id'=>'fullday']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']) !!}
</div>