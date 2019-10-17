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
					<div class="well well-sm"><span class="titlePage">Detalles De Pagos:</span></div>
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>                    
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
                                <?php if(count($ListPayments) > 0): ?>
                                <hr>									
								<table class="table">
                                <thead class="text-primary">
                                <tr>
								    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Codigo Referencia</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Descripción</th>
									<th style="text-align: center !important;font-weight: bold !important;" rowspan="5"># Sesiones</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Valor</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Fecha Creado</th>
									<th style="text-align: center !important;font-weight: bold !important;" rowspan="5">Estado</th>
                                    <th style="text-align: center !important;font-weight: bold !important;" colspan="5" class="text-center">Datos De La Transacción</th>                                   
                                </tr>
								<tr>
                                    <th style="text-align: center !important;font-weight: bold !important;">Fecha Transacción</th>
                                    <th style="text-align: center !important;font-weight: bold !important;">ID Transacción</th>
									<th style="text-align: center !important;font-weight: bold !important;">Referencia Pago</th>
									<th style="text-align: center !important;font-weight: bold !important;">CUS</th>
									<th style="text-align: center !important;font-weight: bold !important;">Entidad Bancaria (PSE)</th>
                                </tr>
								</thead>
								<tbody>	                                							
								<?php $__currentLoopData = $ListPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>								
								<tr>
								<td style="text-align: center !important;"><?php echo e($item->reference_code); ?></td>
								<td style="text-align: center !important;"><?php echo e($item->description); ?></td>
								<td style="text-align: center !important;"><?php echo e($item->total_sessiones); ?></td>
								<td style="text-align: center !important;">$ <?php echo e(number_format($item->value)); ?></td>
								<td style="text-align: center !important;"><?php echo e($item->created_at); ?></td>
								<td style="text-align: center !important;"><?php echo e($item->state_pol); ?></td>
								<td style="text-align: center !important;"><?php echo e($item->transaction_date); ?></td>
								<td style="text-align: center !important;"><?php echo e($item->transaction_id); ?></td>
								<td style="text-align: center !important;"><?php echo e($item->reference_pol); ?></td>								
								<td style="text-align: center !important;"><?php echo e($item->cus); ?></td>								
								<td style="text-align: center !important;"><?php echo e($item->pse_bank); ?></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
								</tbody>
								</table>
								<?php endif; ?>
                                <?php if(count($ListPayments) == 0): ?>
								<div style="text-align: center !important;" class="container">	
                                    <br>
									<hr>									
									<h4>
									<i style="color: #8e24aa !important;" class="material-icons">payment</i><br>
									Usted No Ha Realizado Ningún Tipo De Transacción Con Nosotros.
									</h4>
									<hr>
									<br>
							    </div>
								<?php endif; ?>	                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>