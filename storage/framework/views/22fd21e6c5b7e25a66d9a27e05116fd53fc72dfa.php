<?php $__env->startSection('content'); ?>
    <div class="collapse navbar-collapse" id="navigation-index">
        <ul class="nav navbar-nav navbar-right">

            <?php if(Auth::check()): ?>
                <li>
                <!--<a href="<?php echo e(url('/home')); ?>"><i class="material-icons">person</i>Home</a>-->

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="material-icons">person</i>
                        <?php echo e(Auth::user()->nombres.' '.Auth::user()->apellidos); ?> <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <?php if(Auth::user()->roluser==1): ?>
                                <a href="<?php echo e(url('/modulos/empresas')); ?>">Ingreso al Sistema</a>
                            <?php endif; ?>
                            <?php if(Auth::user()->roluser==2): ?>
                                <a href="<?php echo e(url('/modulos/patients')); ?>">Ingreso al Sistema</a>
                            <?php endif; ?>
                            <?php if(Auth::user()->roluser==3): ?>
                                <a href="<?php echo e(url('/modulos/patients')); ?>">Ingreso al Sistema</a>
                            <?php endif; ?>
                            <?php if(Auth::user()->roluser==4): ?>
                                <a href="<?php echo e(url('/modulos/history_exercises')); ?>">Ingreso al Sistema</a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <a href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>


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

<?php echo $__env->make('layouts.newinicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>