<?php $__env->startSection('content'); ?>


<p><?php echo e($name); ?></p>

        <div class="collapse navbar-collapse" id="navigation-index">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <i class="material-icons">dashboard</i> Components
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons" >settings</i>
                        Settings
                    </a>
                </li>
                <?php if(Auth::check()): ?>
                    <li>
                        <a href="<?php echo e(url('/home')); ?>"><i class="material-icons">person</i>Home</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal">
                            <i class="material-icons">person</i>Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.inicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>