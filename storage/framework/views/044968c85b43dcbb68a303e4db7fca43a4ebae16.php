<div class="row">    
    <?php if(!isset($submitButtonText)): ?>
    <div class="col-md-2">
    <?php else: ?>
    <div class="col-md-4">
    <?php endif; ?>
        <div class="form-group label-floating">
            <label class="control-label">UserName</label>
            <?php echo Form::text('username', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <?php echo $errors->first('username', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>

    <?php if(!isset($submitButtonText)): ?>
        <div class="col-md-2">
            <div class="form-group label-floating">
                <label class="control-label">Password</label>
                <?php echo Form::password('password', ['class' => 'form-control', 'required' => 'required']); ?>

                <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    <?php endif; ?>

    <div class="col-md-3">
        <div class="form-group label-floating">
            <label class="control-label">Tipo Documento</label>
            <?php echo Form::select('tipodoc',
            array('RC' => 'Registro Civil', 'TI' => 'Tarjeta de Identidad',
            'CC' => 'Cédula de Cuidadanía', 'CE' => 'Cédula de Extranjería',
            'AS' => 'Adulto sin identificación', 'MS' => 'Menor sin identificación'), null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('tipodoc', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label">Nro. Documento</label>
            <?php echo Form::text('numdoc', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('numdoc', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Nombres</label>
            <?php echo Form::text('nombres', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <?php echo $errors->first('nombres', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Apellidos</label>
            <?php echo Form::text('apellidos', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <?php echo $errors->first('apellidos', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group label-floating">
            <label class="control-label">Dirección</label>
            <?php echo Form::text('address', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Teléfonos</label>
            <?php echo Form::text('movil', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('movil', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">E-mail</label>
            <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Departamento</label>
            <select class="form-control" name="dpto_cmb" id="dpto_cmb">
                <?php $__currentLoopData = $areas_dpto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area_sel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($area_sel->id==$area_sel->id_dpto): ?>
                        <option value="<?php echo e($area_sel->id); ?>" selected><?php echo e($area_sel->nomarea); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($area_sel->id); ?>"><?php echo e($area_sel->nomarea); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo $errors->first('dpto_cmb', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating" id="div_municipio" name="div_municipio">
            <label class="control-label">Municipio</label>
            <?php echo Form::select('id_area',  $areas_munic , null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('id_area', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Rol</label>
            <?php echo Form::select('roluser', $roles_users, null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('roluser', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Estado</label>
            <?php echo Form::select('estado',  $estados , null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('estado', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="form-group">
    <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']); ?>

    <div class="clearfix"></div>
</div>