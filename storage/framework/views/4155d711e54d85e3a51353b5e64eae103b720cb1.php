<div class="tab-pane fade" id="tab_7"> <!-- begin: Tab_7 -->

<div class="container-fluid">
<br><br>
<!--Table-->
<table id="tableAddExercise" class="table table-hover">
<!--Table head-->
  <thead>
    <tr>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">NOMBRE EJERCICIO</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">USO</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">DESCRIPCIÓN</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">NO. SESIONES</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">TAMAÑO</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">TIEMPO</th>     
    </tr>
  </thead>
  <!--Table head-->
  <!--Table body-->
  <tbody>
  <?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td> 
	  <div class="form-group label-floating">
<div style="text-align: left !important;">		
<label style="line-height: unset !important;" class="containerInput">
  <?php if( count($historyExerciseFill->where('id_exercise', $e->id)) > 0): ?>
  <input id="id_exercise_<?php echo e($e->id); ?>" name="id_exercise[]" class="form-check-input" type="checkbox" value="<?php echo e($e->id); ?>" checked>  
  <?php else: ?>
  <input id="id_exercise_<?php echo e($e->id); ?>" name="id_exercise[]" class="form-check-input" type="checkbox" value="<?php echo e($e->id); ?>">  
  <?php endif; ?>  
  <span style="color: black !important;font-size: 11pt !important;font-weight: bold !important;"><?php echo e($e->description); ?></span> 
  <span class="checkmark"></span>
</label>
</div>
</div>  
	  </td>     
      <td>	      
	  <div class="form-group label-floating">		    		
	  <input id="useExercise_<?php echo e($e->id); ?>" name="useExercise[]" rel="tooltip" title="<?php echo e($e->useExercise); ?>" class="form-control" readonly type="text" value="<?php echo e($e->useExercise); ?>">
      </div>
	  </td>
      <td>
	  <div class="form-group label-floating">
        <textarea id="observation_<?php echo e($e->id); ?>" name="observation[]" rel="tooltip" title="<?php echo e($e->observation); ?>" style="white-space: nowrap !important;resize: both !important;overflow: auto !important;" class="form-control" readonly rows="1" cols="25">
	<?php if( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0): ?> 
		<?php echo e($historyExerciseFill->where('id_exercise', '=', $e->id)->first()->observation); ?>

		<?php else: ?>
		<?php echo e($e->observation); ?>

	<?php endif; ?>
	    </textarea>
        </div>	  
	  </td>
      <td style="width: auto !important;">
	  <div class="form-group label-floating">	  
	  <?php if( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0): ?> 
       <input id="session_<?php echo e($e->id); ?>" name="session[]" style="text-align: center !important;width: 80px;" class="form-control" min="1" max="10" type="number" value='<?php echo e($historyExerciseFill->where('id_exercise', '=', $e->id)->first()->session); ?>'>
		<?php else: ?>
		<input id="session_<?php echo e($e->id); ?>" name="session[]" style="text-align: center !important;width: 80px;" class="form-control" min="1" max="10" type="number" value=''>
 	<?php endif; ?> 	
	  </div>
	  </td>
      <td style="width: auto !important;">
	  <div class="form-group label-floating">
<?php if( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0): ?> 
		<select class="form-control" id="size_<?php echo e($e->id); ?>" name="size[]">	        
            <?php $__currentLoopData = $visual_acuity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visual_acuityKey => $visual_acuityValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
<?php if( $historyExerciseFill->where('id_exercise', '=', $e->id)->first()->size == $visual_acuityKey): ?>
<option value="<?php echo e($visual_acuityKey); ?>" selected><?php echo e($visual_acuityValue); ?><?php if($visual_acuityValue != null): ?> <?php endif; ?></option>

<?php else: ?>
	<option value="<?php echo e($visual_acuityKey); ?>"><?php echo e($visual_acuityValue); ?><?php if($visual_acuityValue != null): ?> <?php endif; ?></option>
<?php endif; ?>		                 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
		<?php else: ?>		
	<select class="form-control" id="size_<?php echo e($e->id); ?>" name="size[]">	        
            <?php $__currentLoopData = $visual_acuity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visual_acuityKey => $visual_acuityValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>			     
                 <option value="<?php echo e($visual_acuityKey); ?>"><?php echo e($visual_acuityValue); ?><?php if($visual_acuityValue != null): ?> <?php endif; ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
	<?php endif; ?> 
        <?php echo $errors->first('size[]', '<p class="help-block">:message</p>'); ?>

	  </div>
	  </td> 
     <td style="width: auto !important;">
	  <div class="form-group label-floating">	  	
		<?php if( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0): ?> 
			<input id="duration_<?php echo e($e->id); ?>" name="duration[]" style="text-align: center !important;width: 80px;" class="form-control" min="5" max="30" step="5" type="number" value='<?php echo e($historyExerciseFill->where('id_exercise', '=', $e->id)->first()->duration); ?>'>
		<?php else: ?>
		<input id="duration_<?php echo e($e->id); ?>" name="duration[]" style="text-align: center !important;width: 80px;" class="form-control" min="5" max="30" step="5" type="number" value=''>
		<?php endif; ?> 			
	  </div>
	  </td>
    </tr>  
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
  <!--Table body-->
</table>
<!--Table-->
</div>

</div> <!-- end: Tab_7 -->

<script type="text/javascript"> 
    $(document).ready(function () {
		<?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		$( '#id_exercise_<?php echo e($e->id); ?>' ).on( 'click', function() {
		if( $(this).is(':checked') ){
			$("#id_exercise_<?php echo e($e->id); ?>").prop('required',true);
			$("#useExercise_<?php echo e($e->id); ?>").prop('required',true);
			$("#observation_<?php echo e($e->id); ?>").prop('required',true);
			$("#size_<?php echo e($e->id); ?>").prop('required',true);
			$("#session_<?php echo e($e->id); ?>").prop('required',true);
			$("#duration_<?php echo e($e->id); ?>").prop('required',true); 	   
        } else {
			$("#id_exercise_<?php echo e($e->id); ?>").prop('required',false);
			$("#useExercise_<?php echo e($e->id); ?>").prop('required',false);
			$("#observation_<?php echo e($e->id); ?>").prop('required',false);
			$("#size_<?php echo e($e->id); ?>").prop('required',false);
			$("#session_<?php echo e($e->id); ?>").prop('required',false);
			$("#duration_<?php echo e($e->id); ?>").prop('required',false);
        }
		});
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    });
</script>
