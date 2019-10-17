<?php $__env->startSection('content'); ?>
<br><br><br><br><br><br><br>
<?php  
$URL_CURRENT = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}"; 
 ?> 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div style="text-transform: uppercase !important;background: #55b559 !important;color: white !important;font-weight: normal !important;" class="panel-heading">Mensaje:</div>
                <div class="panel-body">                       
                           <p style="color: black !important;font-weight: normal;">En segundos recibirá un correo electrónico con el proceso para activar su cuenta en el sistema.</p>
						   <p style="color: black !important;font-weight: normal;">Ingresar al sistema:&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="<?php echo e($URL_CURRENT); ?>/apps/login" target="_parent"><?php echo e($URL_CURRENT); ?>/apps/login</a></b></p>
                </div>
            </div>
        </div>
    </div>
</div>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.newinicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>