<div class="sidebar" data-color="purple" data-image="<?php echo e(asset( 'assets/img/sidebar-1.jpg')); ?>">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo" style="text-align: center !important;">
	  <img src="/apps/img/logo-go-vista-png-150x50.png" width="150" height="50" />    
    <div style="text-align:center !important;text-transform:uppercase !important;font-weight:bold !important;color:black !important;" id="roluser">
	<?php if(Auth::user()->roluser == 1  ): ?>
		<span>Admnistrador</span>
	<?php endif; ?>
	<?php if(Auth::user()->roluser == 2  ): ?>
		<span>Admon. Medico</span>
	<?php endif; ?>
	<?php if(Auth::user()->roluser == 3  ): ?>
		<span>Medico</span>
	<?php endif; ?>
	<?php if(Auth::user()->roluser == 4  ): ?>
		<span>Paciente</span>
	<?php endif; ?>
	</div>    
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
		    <li class="<?php echo e($menu_bar[0]); ?>">
                    <a href="<?php echo e(url('/summary')); ?>">
                        <i class="material-icons">insert_drive_file</i>
                        <p>Resumen</p>
                    </a>
            </li>
            <li class="<?php echo e($menu_bar[1]); ?>">
                <a href="<?php echo e(url('/modulos/empresas')); ?>">
                    <i class="material-icons">domain</i>
                    <p>Empresas</p>
                </a>
            </li>
            <li class="<?php echo e($menu_bar[2]); ?>">
                <a href="<?php echo e(url('/modulos/centrosmedicos')); ?>">
                    <i class="material-icons">local_hospital</i>
                    <p>Centros Medicos</p>
                </a>
            </li>
            <li class="<?php echo e($menu_bar[3]); ?>">
                <a href="<?php echo e(url('/modulos/medicos')); ?>">
                    <i class="material-icons">group</i>
                    <p>Medicos</p>
                </a>
            </li>
            <li class="<?php echo e($menu_bar[4]); ?>">
                <a href="<?php echo e(url('/modulos/entidades')); ?>">
                    <i class="material-icons">account_balance</i>
                    <p>E.P.S.</p>
                </a>
            </li>
            <li class="<?php echo e($menu_bar[5]); ?>">
                <a href="<?php echo e(url('/modulos/exercises')); ?>">
                    <i class="material-icons">widgets</i>
                    <p>Ejercicios</p>
                </a>
            </li>
            <li class="<?php echo e($menu_bar[6]); ?>">
                <a href="<?php echo e(url('/modulos/users')); ?>">
                    <i class="material-icons">person</i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('/modulos/patients')); ?>">
                    <i class="material-icons">arrow_forward</i>
                    <p>Módulo de Medico</p>
                </a>
            </li>

        </ul>
    </div>
</div>
