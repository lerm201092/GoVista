<?php $__env->startSection('content'); ?>
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">	
        <div class="col-md-8 col-md-offset-2">	
       <?php if(session('status')): ?>
        <div class="alert alert-success">
           <?php echo e(session('status')); ?>

        </div>
       <?php endif; ?>
	   <?php if(session('error')): ?>
        <div class="alert alert-danger">
           <?php echo e(session('error')); ?>

        </div>
       <?php endif; ?>		
            <div class="panel panel-default">
                <div style="text-transform: uppercase !important;background: #9c27b0 !important;color: white !important;font-weight: normal !important;" class="panel-heading">Restablecer Contraseña</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label style="font-size: 15px !important;color: #000 !important;" for="email" class="col-md-4 control-label">Correo Electrónico:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>							
							<div style="text-align: center !important;" class="form-group">
							<button class="btn btn-primary btn-sm" onclick="javascript:window.location='<?php echo e(route('login')); ?>';"id="next-btn-smartwizard" type="button"><i class="material-icons">keyboard_arrow_left</i>&nbsp;Regresar&nbsp;</button>
							&nbsp;&nbsp;&nbsp;
							<button class="btn btn-primary btn-sm" id="prev-btn-smartwizard" type="submit">&nbsp;Enviar&nbsp;<i class="material-icons">send</i></button>
							</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Alert message -->	
	<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
	}, 3000);
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.newinicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>