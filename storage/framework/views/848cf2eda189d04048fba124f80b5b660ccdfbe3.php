<div class="tab-pane" id="tab_3"> <!-- begin: Tab_3 -->
        <br>
    <div class="row">
    <div class="col-md-12">            
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Dirección</label>
                                <?php echo Form::text('address', null, ['class' => 'form-control']); ?>

                                <?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Teléfono</label>
                                <?php echo Form::text('phone', null, ['class' => 'form-control']); ?>

                                <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Zona</label>
                                <?php echo Form::select('zone', $zona, null, ['class' => 'form-control']); ?>

                                <?php echo $errors->first('zone', '<p class="help-block">:message</p>'); ?>

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
                                            <option value="<?php echo e($area_sel->id); ?>"
                                                    selected><?php echo e($area_sel->nomarea); ?></option>
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
                </div>          
    </div>
</div>
           
</div> <!-- end: Tab_3 -->