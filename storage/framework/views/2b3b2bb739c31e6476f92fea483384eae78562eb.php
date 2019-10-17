<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">   
                <div class="card">
					<div class="well well-sm"><span class="titlePage">Listado de los Ejercicios registrados:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            <?php echo Form::open(['method' => 'GET', 'url' => '/modulos/history_exercises', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                <button type="submit" class="btn btn-info btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                            <?php echo Form::close(); ?>

                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th style="font-weight: bold !important;" rowspan="2">Observación</th>
                                    <th style="font-weight: bold !important;" rowspan="2">Paciente</th>
                                    <th style="font-weight: bold !important;" rowspan="2">Fecha Asiganación</th>
                                    <th style="font-weight: bold !important;" rowspan="2">Duración Min</th>
                                    <th style="font-weight: bold !important;" colspan="2" class="text-center">Sesiones</th>
                                    <th style="font-weight: bold !important;" rowspan="2"></th>
                                </tr>
                                <tr>
                                    <th style="font-weight: bold !important;">Programadas</th>
                                    <th style="font-weight: bold !important;">Realizadas</th>
                                </tr>
                                </thead>
                                <?php $__currentLoopData = $history_exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->observation); ?></td>
                                        <td><?php echo e(ucwords(strtolower($item->name1)).' '.ucwords(strtolower($item->surname1))); ?></td>
                                        <td><?php echo e($item->created_at); ?></td>
                                        <td><?php echo e($item->duration); ?></td>
                                        <td><?php echo e($item->session); ?></td>
                                        <td><?php echo e($item->session_ok); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(url('/modulos/history_exercises_detail/' . Crypt::encrypt($item->id))); ?>">
                                                <button type="button" rel="tooltip" title="Histórico Ejecución del Ejercicio"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <?php if($item->session > $item->session_ok && $rol_user==4): ?>
                                                <a href="<?php echo e(url('/modulos/history_exercises/playexercise/' . Crypt::encrypt($item->id))); ?>">
                                                    <button type="button" rel="tooltip" title="Ejecutar el Ejercicio"
                                                            class="btn btn-info btn-simple btn-xs">
                                                        <i class="material-icons">play_circle_outline</i>
                                                    </button>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $history_exercises->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
      

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>