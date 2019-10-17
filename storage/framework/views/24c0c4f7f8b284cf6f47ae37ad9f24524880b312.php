<?php $__env->startSection('content'); ?>
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="text-transform: uppercase !important;background: #55b559 !important;color: white !important;font-weight: normal !important;" class="panel-heading">Mensaje:</div>
                <div class="panel-body">                       
                           <p style="color: black !important;">La contraseña ha sido cambiada.</p>
						   <p style="color: black !important;">Ingresar al sistema:&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo URL::to('/login'); ?>" target="_parent"><?php echo URL::to('/login'); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.newinicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>