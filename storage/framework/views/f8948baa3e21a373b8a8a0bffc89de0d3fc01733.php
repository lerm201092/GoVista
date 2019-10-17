<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Histórico de los Ejercicios:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <a href="<?php echo e(url('/modulos/history_exercises')); ?>" title="Back">
                            <button type="button" rel="tooltip" title="Regresar"
                                    class="btn btn-warning btn-round btn-just-icon">
                                <i class="material-icons">arrow_back</i>
                            </button>
                        </a>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th style="text-align: left !important;" rowspan="2">Fecha / Hora de Ejecución del Ejercicio</th>
                                    <th style="text-align: center !important;" rowspan="2">Duración Min</th>
                                    <th style="text-align: center !important;" rowspan="2">Estado</th>
									<th style="text-align: center !important;" rowspan="2">Coin</th>
									<th style="text-align: center !important;" rowspan="2">Estrellas</th>
                                </tr>
                                </thead>
                                <?php $__currentLoopData = $history_exercises_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: left !important;"><?php echo e($item->created_at); ?></td>
                                        <td style="text-align: center !important;"><?php echo e($item->duracion); ?></td>
									<?php if($item->status == "OK"): ?>	
                                        <td style="border-collapse: separate !important;color: green !important;font-weight: bold !important;text-align: center !important;"><?php echo e($item->status); ?></td>
									<?php elseif($item->status == "AC"): ?>	
										<td style="border-collapse: separate !important;color: blue !important;font-weight: bold !important;text-align: center !important;"><?php echo e($item->status); ?></td>
									<?php elseif($item->status == "IN"): ?>
										<td style="border-collapse: separate !important;color: red !important;font-weight: bold !important;text-align: center !important;"><?php echo e($item->status); ?></td>
									<?php elseif($item->status == "SA"): ?>
										<td style="border-collapse: separate !important;color: darkred !important;font-weight: bold !important;text-align: center !important;"><?php echo e($item->status); ?></td>
									<?php else: ?>
										<td style="border-collapse: separate !important;text-align: center !important;"><?php echo e($item->status); ?></td>
									<?php endif; ?>
										<td style="border-collapse: separate !important;text-align: center !important;">												
										<?php echo e($item->coin); ?>	
										</td> 
										<td style="border-collapse: separate !important;text-align: center !important;">
										<?php echo e($item->star); ?>

										</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $history_exercises_detail->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>