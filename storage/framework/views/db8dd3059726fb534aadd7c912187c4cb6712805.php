<div class="form-group <?php echo e($errors->has('id') ? 'has-error' : ''); ?>">
    <?php echo Form::label('id', 'Id', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('id', null, ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('id', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('id_tipo') ? 'has-error' : ''); ?>">
    <?php echo Form::label('id_tipo', 'Id Tipo', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::select('id_tipo',  array('0' => 'Continente','1' => 'Pais', '2' => 'Departamento', '3' => 'Municipio'), null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('id_tipo', '<p class="help-block">:message</p>'); ?>

    </div>
</div>


<div class="form-group <?php echo e($errors->has('padre') ? 'has-error' : ''); ?>">
    <?php echo Form::label('padre', 'Padre', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6" id="padre_cmb" name="padre_cmb">
        <select class="form-control" name="padre" id="padre">
            <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area_sel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($area)): ?>
                    <?php if($area->padre==$area_sel->id): ?>
                        <option value="<?php echo e($area_sel->id); ?>" selected><?php echo e($area_sel->nomarea); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($area_sel->id); ?>"><?php echo e($area_sel->nomarea); ?></option>
                    <?php endif; ?>
                <?php else: ?>
                    <option value="<?php echo e($area_sel->id); ?>"><?php echo e($area_sel->nomarea); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php echo $errors->first('padre', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('codarea') ? 'has-error' : ''); ?>">
    <?php echo Form::label('codarea', 'Codarea', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('codarea', null, ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('codarea', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('nomarea') ? 'has-error' : ''); ?>">
    <?php echo Form::label('nomarea', 'Nomarea', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('nomarea', null, ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('nomarea', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']); ?>

    </div>
</div>
