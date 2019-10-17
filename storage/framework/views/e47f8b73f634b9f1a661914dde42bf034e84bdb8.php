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
					<div class="well well-sm"><span class="titlePage">Cambiar Contraseña:</span></div>
                    <div class="card-body">
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('changePassword')); ?>">
                            <?php echo e(csrf_field()); ?>					
							
							<div class="form-group row">
                                            <label for="current-password" class="col-md-4 col-form-label text-md-right">Contraseña Actual</label>
                                            <div class="col-md-6">
                                                <input id="current-password" type="password" class="form-control" name="current-password" data-toggle="password" required />
												<?php if($errors->has('current-password')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('current-password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                            </div>
                                        </div>							
							
							<div class="form-group row">
                                            <label for="new-password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>
                                            <div class="col-md-6">
                                                <input id="new-password" type="password" class="form-control" name="new-password" data-toggle="password" required />
												<?php if($errors->has('new-password')): ?>
                                        <span class="help-block">
                                         <strong><?php echo e($errors->first('new-password')); ?></strong>
                                    </span>	
                                    <?php endif; ?>
                                            </div>
                                        </div>
							
							<div class="form-group row">
                                            <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Nueva Contraseña</label>
                                            <div class="col-md-6">
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password-confirm" data-toggle="password" required />
												<?php if($errors->has('new-password-confirm')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('new-password-confirm')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                            </div>
                                        </div>	
								
    <!-- Alert message -->								
    <?php if(Session::has('flash_message')): ?>
    <div style="padding: 20px 30px !important;" class="alert alert-danger alert-dismissible fade in">
     <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Error:&nbsp;</strong><?php echo e(Session::get('flash_message')); ?>

    </div>
	<?php endif; ?>							
													

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<!-- Put icon see password in input -->
	<script src="<?php echo e(asset('assets/js/bootstrap-show-password.min.js')); ?>" type="text/javascript"></script>	
	<script type="text/javascript">
	$("#current-password").password('toggle');
	$("#new-password").password('toggle');
	$("#new-password-confirm").password('toggle');
    </script>
	
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