<div class="tab-pane fade" id="tab_3"> <!-- begin: Tab_3 -->
        <br>
        <div class="panel panel-default"> <!-- begin: Panel Lensometría (Tab_3) -->
            <div style="background:#6d4c41 !important;color:white !important;" class="panel-heading"><b>LENSOMETRÍA:</b></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipo de Lentes</label>
                            <?php echo Form::text('tipolente', isset($historyFill) ? $historyFill->tipolente : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('tipolente', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Color</label>
                            <?php echo Form::text('color', isset($historyFill) ? $historyFill->color : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('color', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Filtro</label>
                            <?php echo Form::text('filtro', isset($historyFill) ? $historyFill->filtro : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('filtro', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Coloracion</label>
                            <?php echo Form::text('coloracion', isset($historyFill) ? $historyFill->coloracion : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('coloracion', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Uso de Lentes</label>
                            <?php echo Form::text('usolente', isset($historyFill) ? $historyFill->usolente : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('usolente', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>
            </div></div> <!-- end: Panel Lensometría (Tab_3) -->

        <div class="panel panel-default"> <!-- begin: Panel Agudeza Visual (Tab_3) -->
            <div style="background:#6d4c41 !important;color:white !important;" class="panel-heading"><b>AGUDEZA VISUAL:</b></div>
            <div class="panel-body">

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <h6 class="text-center">ESFERA <br> (Dioptrias)</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">CILINDRO</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">EJE</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">PRISMA</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">BASE</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                        <select class="form-control" id="od_esfera" name="od_esfera">
                                <?php $__currentLoopData = $esfera_cilindro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_esfera ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                        
                        <select class="form-control" id="od_cilindro" name="od_cilindro">
                                <?php $__currentLoopData = $esfera_cilindro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_cilindro ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <select class="form-control" id="od_eje" name="od_eje">
                                <?php $__currentLoopData = $eje; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_eje ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?><?php if($itemValue != null): ?>&#176; <?php endif; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?><?php if($itemValue != null): ?>&#176; <?php endif; ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('od_prisma', isset($historyFill) ? $historyFill->od_prisma : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('od_prisma', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('od_base', isset($historyFill) ? $historyFill->od_base : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('od_base', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-2">                        
                        <select class="form-control" id="oi_esfera" name="oi_esfera">
                                <?php $__currentLoopData = $esfera_cilindro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_esfera ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="oi_cilindro" name="oi_cilindro">
                                <?php $__currentLoopData = $esfera_cilindro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_cilindro ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="oi_eje" name="oi_eje">
                                <?php $__currentLoopData = $eje; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_eje ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?><?php if($itemValue != null): ?>&#176; <?php endif; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?><?php if($itemValue != null): ?>&#176; <?php endif; ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('oi_prisma', isset($historyFill) ? $historyFill->oi_prisma : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('oi_prisma', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('oi_base', isset($historyFill) ? $historyFill->oi_base : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('oi_base', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">AGUDEZA VISUAL DE CERCA</h6>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">AGUDEZA VISUAL DE LEJOS</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">AV PH</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                        <select class="form-control" id="od_av_cerca_cc" name="od_av_cerca_cc">
                                <?php $__currentLoopData = $cc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_av_cerca_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="od_av_cerca_sc" name="od_av_cerca_sc">
                                <?php $__currentLoopData = $sc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_av_cerca_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="od_av_lejos_cc" name="od_av_lejos_cc">
                                <?php $__currentLoopData = $cc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_av_lejos_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="od_av_lejos_sc" name="od_av_lejos_sc">
                                <?php $__currentLoopData = $sc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_av_lejos_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="od_av_ph" name="od_av_ph">
                                <?php $__currentLoopData = $sc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_av_ph ): ?>
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
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="oi_av_cerca_cc" name="oi_av_cerca_cc">
                                <?php $__currentLoopData = $cc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_av_cerca_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select> 
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                             <select class="form-control" id="oi_av_cerca_sc" name="oi_av_cerca_sc">
                                <?php $__currentLoopData = $sc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_av_cerca_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="oi_av_lejos_cc" name="oi_av_lejos_cc">
                                <?php $__currentLoopData = $cc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_av_lejos_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">  
                            <select class="form-control" id="oi_av_lejos_sc" name="oi_av_lejos_sc">
                                <?php $__currentLoopData = $sc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_av_lejos_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="oi_av_ph" name="oi_av_ph">
                                <?php $__currentLoopData = $sc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_av_ph ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select> 
                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">ESTADO FORICO HABITUAL</h6>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">ESTADO FORICO HABITUAL LEJOS</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">OJO DOMINANTE</h6>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <select class="form-control" id="ojo_dominante" name="ojo_dominante">
                                <?php $__currentLoopData = $ojoDominante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ojo_dominante ): ?>
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
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">HO</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="ho_forico_cerca_cc" name="ho_forico_cerca_cc">
                                <?php $__currentLoopData = $ho; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_cerca_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating"> 
                            <select class="form-control" id="ho_forico_cerca_sc" name="ho_forico_cerca_sc">
                                <?php $__currentLoopData = $ho; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_cerca_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="ho_forico_lejos_cc" name="ho_forico_lejos_cc">
                                <?php $__currentLoopData = $ho; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_lejos_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="ho_forico_lejos_sc" name="ho_forico_lejos_sc">
                                <?php $__currentLoopData = $ho; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_lejos_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 class="text-center">MANO DOMINANTE</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">VE</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="ve_forico_cerca_cc" name="ve_forico_cerca_cc">
                                <?php $__currentLoopData = $ve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_cerca_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <select class="form-control" id="ve_forico_cerca_sc" name="ve_forico_cerca_sc">
                                <?php $__currentLoopData = $ve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_cerca_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="ve_forico_lejos_cc" name="ve_forico_lejos_cc">
                                <?php $__currentLoopData = $ve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_lejos_cc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <select class="form-control" id="ve_forico_lejos_sc" name="ve_forico_lejos_sc">
                                <?php $__currentLoopData = $ve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_lejos_sc ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                          
                            <select class="form-control" id="mano_dominante" name="mano_dominante">
                                <?php $__currentLoopData = $manoDominante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->mano_dominante ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">ANGULO KAPPA</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center">PUNTO PROXIMO DE CONVERGENCIA (PPC)</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-4">					
					<div class="form-group label-floating">                           
                            <select class="form-control" id="od_ang_kappa" name="od_ang_kappa">
                                <?php $__currentLoopData = $anguloKappa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->od_ang_kappa ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OR</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                        <?php echo Form::text('ppc_or', isset($historyFill) ? $historyFill->ppc_or : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('ppc_or', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group label-floating">
                            <select class="form-control" id="oi_ang_kappa" name="oi_ang_kappa">
                                <?php $__currentLoopData = $anguloKappa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->oi_ang_kappa ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>					
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SF</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <?php echo Form::text('ppc_sf', isset($historyFill) ? $historyFill->ppc_sf : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('ppc_sf', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">FIJACIÓN</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center">COVER TEST</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('od_fijacion', isset($historyFill) ? $historyFill->od_fijacion : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('od_fijacion', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">LEJOS</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <?php echo Form::text('ctest_lejos', isset($historyFill) ? $historyFill->ctest_lejos : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('ctest_lejos', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('oi_fijacion', isset($historyFill) ? $historyFill->oi_fijacion : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('oi_fijacion', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CERCA</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <?php echo Form::text('ctest_cerca', isset($historyFill) ? $historyFill->ctest_cerca : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('ctest_cerca', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-6">
                        <h6 class="text-center">DISTANCIA INTERPUPILAR (Milimetros)</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center">TAMAÑO PUPILA (Milimetros)</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('dist_interpupilar', isset($historyFill) ? $historyFill->dist_interpupilar : null,  ['class' => 'form-control']); ?>

                            <?php echo $errors->first('dist_interpupilar', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <?php echo Form::text('pupila', isset($historyFill) ? $historyFill->pupila : null, ['class' => 'form-control']); ?>

                            <?php echo $errors->first('pupila', '<p class="help-block">:message</p>'); ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">OBSERVACIONES:</label>
                        <div class="form-group label-floating">
                            <?php echo Form::textarea('observacion', isset($historyFill) ? $historyFill->observacion : null, ['class'=>'form-control', 'rows' => 2, 'cols' => 50, 'maxlength' => '500']); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
</div> <!-- end: Tab_3 -->