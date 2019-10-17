<div class="row">        
    <div class="col-md-3">
        <div class="form-group label-floating">
            <label class="control-label">Nit</label>
            <?php echo Form::number('nit', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('nit', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group label-floating">
            <label class="control-label">Nombre de Empresa</label>
            <?php echo Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <?php echo $errors->first('nombre', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group label-floating">
            <label class="control-label">Dirección</label>
            <?php echo Form::text('direccion', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <?php echo $errors->first('direccion', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Teléfonos</label>
            <?php echo Form::text('telefono', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('telefono', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">E-mail</label>
            <?php echo Form::email('email', null, ['class' => 'form-control', 'required' => 'required']); ?>

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
            <label class="control-label">Contacto</label>
            <?php echo Form::text('contacto', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('contacto', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Estado</label>
            <?php echo Form::select('estado', $estados , null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('estado', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="form-group">
    <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']); ?>

    <div class="clearfix"></div>
</div>