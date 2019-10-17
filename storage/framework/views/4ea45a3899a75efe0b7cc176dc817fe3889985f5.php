<div class="row">    
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Nombre del Centro Médico</label>
            <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Empresa</label>
            <?php echo Form::select('id_empresa',  $empresas , null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('id_empresa', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group label-floating">
            <label class="control-label">Descripción</label>
            <?php echo Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required','rows'=>"4"]); ?>

            <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

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
            <?php echo Form::text('phone', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

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
            <?php echo $errors->first('estado', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6" >
        <div class="form-group label-floating"  id="div_municipio" name="div_municipio">
            <label class="control-label">Municipio</label>
            <?php echo Form::select('id_area',  $areas_munic , null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('estado', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Contacto</label>
            <?php echo Form::text('contact', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('contact', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Estado</label>
            <?php echo Form::select('estado',  $estados, null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('estado', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="form-group">
    <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']); ?>

    <div class="clearfix"></div>
</div>