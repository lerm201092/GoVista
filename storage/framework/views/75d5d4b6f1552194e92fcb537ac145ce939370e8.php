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
                    <div class="card-header" data-background-color="purple">
					<h4 class="title">Resumen Transacción</h4>
					</div>
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="container">
                           <br><br>
                               <div class="row">
							    <div style="text-align: center !important;" class="col-md-12">
								<div class="row">
                                <div class="col-md-12" style="text-transform:uppercase !important;text-align:center !important;">
								<p style="color:white !important;background-color: <?php echo e($transactionStateColor); ?> !important;"><?php echo e($transactionStateText); ?></p>       					
								</div>								 
                                </div>	
								<span style="text-align: center !important;text-transform: uppercase !important;">
								Referencia De Pago:&nbsp;<b><?php echo e($reference_pol); ?></b><br>
								Fecha:&nbsp;<b><?php echo e($processingDate); ?>

								</span>	
                                <hr>						
								</div> 
								</div>
								<div class="row">
								<div class="col-md-6">
								<h6>Ref. Transaccion:&nbsp;<b><?php echo e($referenceCode); ?></b></h6>	
								</div>
								<div class="col-md-6">
								<h6>ID Transaccion:&nbsp;<b><?php echo e($transactionId); ?></b></h6>	
								</div>								
							</div>
							<div class="row">
							<div style="background: #eee !important;color: black !important;border-radius: 50px !important;" class="col-md-12">
							<h4 style="font-weight: bold !important;text-align: center !important;text-transform: uppercase !important;"><u>Detalles</u></h4>	
							</div>
							</div>
							<br>
							<div class="row">
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Descripción</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Valor Total</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Moneda</p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: uppercase !important;font-weight: bold !important;">Entidad</p>	
							</div>							
							</div>
							<br>
							<div class="row">
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;"><?php echo e($description); ?></p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;">$ <?php echo e(number_format($txValue)); ?></p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;"><?php echo e($currency); ?></p>	
							</div>							
							<div class="col-md-3">
							<p style="text-align: center !important;text-transform: normal !important;"><?php echo e($lapPaymentMethod .' ('.$lapPaymentMethodType.')'); ?></p>	
							</div>							
							</div>
							<br>
							<?php if($isPSEBank == true): ?>
							<div style="text-align: center !important;" class="row">
							<div title="Código Único de Seguimiento" class="col-md-6">
							<span style="font-weight: bold !important;">CUS</span><br><?php echo e($cus); ?> 
							</div>
							<div class="col-md-6">
							<span style="font-weight: bold !important;">Banco</span><br><?php echo e($pseBank); ?> 
							</div>							
							</div>
							<?php endif; ?>
							<br><br><br><br><br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>