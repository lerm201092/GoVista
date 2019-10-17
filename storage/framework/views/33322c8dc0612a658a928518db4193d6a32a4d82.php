<!-- SideBar -->
<?php if(Auth::user()->roluser == 1  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(Auth::user()->roluser == 2  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>	
<?php endif; ?>
<?php if(Auth::user()->roluser == 3  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(Auth::user()->roluser == 4  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content_body'); ?>
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">                   
					<div class="well well-sm"><span class="titlePage">Tienda GoVista:</span></div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
						<?php if(session('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="container">
						<br>
                            <div class="row">
                                <div class="col-12">
                                    <?php if($errors->any()): ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php echo e($error); ?>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
  <div class="row">
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="thumbnail">
					
					<div style="position: relative;text-align: center;color: white;">
   <img style="width: 200px !important;height: 200px !important;" src="<?php echo e(asset('img/products/'.$product->item)); ?>.jpg" />
  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"><h4 style="text-transform: uppercase !important;font-weight: bold !important;">Paquete De <br><?php echo $product->description; ?></h4></div>
</div>

                      
                        <div style="text-align: center !important;" class="caption">
                            <h4><?php echo e($product->name); ?></h4>
                            <h4><?php echo e(str_limit(strtolower($product->description), 50)); ?></h4>
                            <h4><strong>Precio: </strong>$ <?php echo e(number_format($product->price)); ?></h4>
                            <p class="btn-holder"><a href="<?php echo e(url('add-to-cart/'.$product->id)); ?>" class="btn btn-primary text-center" role="button"> <i class="material-icons">shopping_cart</i>&nbsp;AÑADIR AL CARRITO</a> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>                   
                                </div>
                            </div>
                        </div>
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
<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>