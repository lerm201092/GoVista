<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Listado De Las Empresas Registradas:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            <a href="<?php echo e(url('/modulos/empresas/create')); ?>"
                               class="btn btn-success btn-round btn-just-icon"
                               title="Crear Nueva Empresa">
                                <i class="material-icons">add</i></a>

                            <?php echo Form::open(['method' => 'GET', 'url' => '/modulos/empresas', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

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
                                <th>Nit</th>
                                <th>Nombre de la Empresa</th>
                                <th></th>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><?php echo e($item->nit); ?></td>
                                        <td><?php echo e(ucwords(mb_strtolower($item->nombre))); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(url('/modulos/empresas/' . $item->id)); ?>">
                                                <button type="button" rel="tooltip" title="Ver Datos de la Empresa"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="<?php echo e(url('/modulos/empresas/' . $item->id . '/edit')); ?>">
                                                <button type="button" rel="tooltip" title="Editar Datos de la Empresa"
                                                        class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $empresas->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>