<div class="tab-pane fade" id="tab_5">  <!-- begin: Tab_5 -->
        <br>
        <div class="row"> 
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Luces worth</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Distancia (CM)</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Ojo que Suprime</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Bagolini</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Post Imagenes</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Anomalia</h6>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <div class="form-group label-floating">      
                    <select disabled class="form-control" id="luz_worth" name="luz_worth">
                                <?php $__currentLoopData = $LucesWorth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->luz_worth ): ?>
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
                      <select disabled class="form-control" id="distancia" name="distancia">
                                <?php $__currentLoopData = $distanciaCM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->distancia ): ?>
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
                    <select disabled class="form-control" id="ojo_suprime" name="ojo_suprime">
                                <?php $__currentLoopData = $OjoSuprime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ojo_suprime ): ?>
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
                    <select disabled class="form-control" id="bagolini" name="bagolini">
                                <?php $__currentLoopData = $Bagolini; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->bagolini ): ?>
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
                    <select disabled class="form-control" id="post_img" name="post_img">
                                <?php $__currentLoopData = $PostImagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->post_img ): ?>
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
                    <select disabled class="form-control" id="ang_anomalia" name="ang_anomalia">
                                <?php $__currentLoopData = $angulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->ang_anomalia ): ?>
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
            <div class="col-md-4">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Correspondencia Sensorial:</h6>
            </div>
            <div class="col-md-1">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center"><br>Cerca:</h6>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">                   
                    <select disabled class="form-control" id="cs_cerca" name="cs_cerca">
                                <?php $__currentLoopData = $CorrespondenciaSensorial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->cs_cerca ): ?>
                                    <option value="<?php echo e($itemKey); ?>" selected><?php echo e($itemValue); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($itemKey); ?>"><?php echo e($itemValue); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
            </div>
            <div class="col-md-1">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center"><br>Lejos:</h6>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">                    
                     <select disabled class="form-control" id="cs_lejos" name="cs_lejos">
                                <?php $__currentLoopData = $CorrespondenciaSensorial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->cs_lejos ): ?>
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
            <div class="col-md-12">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center"><b>Estereopsis:</b></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Test Usado:</h6>
            </div>
            <div class="col-md-10">
                <div class="form-group label-floating">
                   <select disabled class="form-control" id="test" name="test">
                                <?php $__currentLoopData = $TestUsado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKey => $itemValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( isset($historyFill) && $itemValue ==  $historyFill->test ): ?>
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
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFNV VL</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('rfnv_vl', isset($historyFill) ? $historyFill->rfnv_vl : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('rfnv_vl', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFN VP</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('rfn_vp', isset($historyFill) ? $historyFill->rfn_vp : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('rfn_vp', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFP VL</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('rfp_vl', isset($historyFill) ? $historyFill->rfp_vl : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('rfp_vl', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFP VP</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('rfp_vp', isset($historyFill) ? $historyFill->rfp_vp : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('rfp_vp', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>AA OD</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('aa_od', isset($historyFill) ? $historyFill->aa_od : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('aa_od', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>AA OI</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('aa_oi', isset($historyFill) ? $historyFill->aa_oi : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('aa_oi', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>NIVEL VISUAL OD</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('nivel_visual_od', isset($historyFill) ? $historyFill->nivel_visual_od : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('nivel_visual_od', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>NIVEL VISUAL OI</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('nivel_visual_oi', isset($historyFill) ? $historyFill->nivel_visual_oi : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('nivel_visual_oi', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>TECNICA</h6>
            </div>
            <div class="col-md-10">
                <div class="form-group label-floating">
                    <?php echo Form::text('tecnica', isset($historyFill) ? $historyFill->tecnica : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('tecnica', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>FLEXIBILIDAD OD</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('flexibilidad_od', isset($historyFill) ? $historyFill->flexibilidad_od : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('flexibilidad_od', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>FLEXIBILIDAD OI</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <?php echo Form::text('flexibilidad_oi', isset($historyFill) ? $historyFill->flexibilidad_oi : null,  ['class' => 'form-control','disabled']); ?>

                    <?php echo $errors->first('flexibilidad_oi', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>

</div> <!-- end: Tab_5 -->