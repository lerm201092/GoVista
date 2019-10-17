<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                   
					<div class="well well-sm"><span class="titlePage">Listado de las Historias Clínicas registradas:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            <?php echo Form::open(['method' => 'GET', 'url' => '/modulos/histories', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

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
                                <th>ID</th>
                                <th>Fecha/Hora HC</th>
                                <th>Tipo Doc.</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Médico</th>
                                <th>Estado</th>
                                <th></th>
                                </thead>
                                <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->historydate); ?></td>
                                        <td><?php echo e($item->tipodoc); ?></td>
                                        <td><?php echo e($item->numdoc); ?></td>
                                        <td><?php echo e(ucwords(mb_strtolower($item->name1.' '.$item->name2))); ?></td>
                                        <td><?php echo e(ucwords(mb_strtolower($item->surname1.' '.$item->surname2))); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->state); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(url('/modulos/histories/' . $item->id)); ?>">
                                                <button type="button" rel="tooltip"
                                                        title="Ver Datos de la Historia Clínica"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="<?php echo e(url('/modulos/histories/dashboard/' . $item->id_patient)); ?>">
                                                <button type="button" rel="tooltip"
                                                        title="Ver Panel de Usuario"
                                                        class="btn btn-success btn-simple btn-xs">
                                                    <i class="material-icons">dashboard</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $histories->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>