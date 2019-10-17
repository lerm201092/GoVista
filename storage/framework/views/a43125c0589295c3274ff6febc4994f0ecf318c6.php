<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Información:</span></div> 
                    <!--- Body -->
                    <div class="card-content">
                        <div class="card-content table-responsive">
                            <a href="<?php echo e(url('/modulos/exercises')); ?>">
                                <button type="button" rel="tooltip" title="Regresar"
                                        class="btn btn-warning btn-round btn-just-icon">
                                    <i class="material-icons">arrow_back</i>
                                </button>
                            </a>
                            <a href="<?php echo e(url('/modulos/exercises/' . $exercise->id . '/edit')); ?>"
                               title="Edit Médico">
                                <button type="button" rel="tooltip" title="Editar Datos del Ejercicio"
                                        class="btn btn-primary btn-round btn-just-icon">
                                    <i class="material-icons">edit</i>
                                </button>
                            </a>
                            <br/>
                            <br/>

                            <table class="table table-borderless">
                                <thead class="text-primary">
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-primary">ID</td>
                                    <td><?php echo e($exercise->id); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Descripción</td>
                                    <td> <?php echo e(ucwords(mb_strtolower($exercise->description))); ?> </td>
                                </tr>
                                <tr>
                                    <td class="text-primary"> Observaciones</td>
                                    <td> <?php echo e(ucwords(mb_strtolower($exercise->observation))); ?> </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                        <!--- Fin Body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>