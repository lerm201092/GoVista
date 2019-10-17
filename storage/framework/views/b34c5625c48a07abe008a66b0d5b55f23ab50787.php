<div class="row">              
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Nombre del Médico</label>
            <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Asignar Empresa</label>     
                        <select style="resize: inline !important;max-width: 600px !important;width: 100% !important;height: 100px !important;overflow: auto !important;" class="form-control" name="id_empresa[]" multiple>
                           <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                  
                           <?php if( isset($user_empresas) && $user_empresas->contains($itemKey) ): ?>              
                            <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                           <?php else: ?> 
                            <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                           <?php endif; ?>   
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>  
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Especialidad</label>
            <?php echo Form::text('specialty', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('specialty', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
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
