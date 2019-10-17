<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Actualización:</span></div>                  
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">
                                    <a href="<?php echo e(url('/modulos/exercises')); ?>">
                                        <button type="button" rel="tooltip" title="Regresar"
                                                class="btn btn-warning btn-round btn-just-icon">
                                            <i class="material-icons">arrow_back</i>
                                        </button>
                                    </a>
                                    <br/>
                                    <br/>
                                    <?php if($errors->any()): ?>
                                        <ul class="alert alert-danger">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>

                                    <?php echo Form::model($exercise, [
                                        'method' => 'PATCH',
                                        'url' => ['/modulos/exercises', $exercise->id],
                                        'class' => 'form',
                                        'files' => true
                                    ]); ?>

                                    <?php echo Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']); ?>

                                    <?php echo $__env->make('modulos.exercises.form', ['submitButtonText' => 'Actualizar'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>