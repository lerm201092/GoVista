<!-- begin: Nav tabs -->
<ul class="nav nav-tabs" role="tablist" data-background-color="purple">
    <li style="text-align: center !important;" class="active">
        <a href="#tab_1" role="tab" data-toggle="tab"> <i class="material-icons">perm_identity</i> Datos Personales </a>
    </li>
    <li style="text-align: center !important;">	           
        <a href="#tab_2" role="tab" data-toggle="tab"> <i class="material-icons">today</i> Afiliación </a>
    </li>
	<li style="text-align: center !important;">
        <a href="#tab_3" role="tab" data-toggle="tab"> <i class="material-icons">place</i> Contacto </a>
    </li>

    <li style="text-align: center !important;">
        <a href="#tab_4" role="tab" data-toggle="tab"> <i class="material-icons">contacts</i> Contacto de Emergencia </a>
    </li>

    <li style="text-align: center !important;">
        <a href="#tab_5" role="tab" data-toggle="tab"> <i class="material-icons">wc</i> Datos Padres </a>
    </li>
</ul>
<!-- end: Nav tabs -->

<div style="height: 410px !important;" class="tab-content"> <!-- begin: Tab Content -->

    <!-- Tab #1 -->
	<?php echo $__env->make('modulos.patients.tabs.tab1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<!-- Tab #2 -->
	<?php echo $__env->make('modulos.patients.tabs.tab2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<!-- Tab #3 -->
	<?php echo $__env->make('modulos.patients.tabs.tab3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<!-- Tab #4 -->
	<?php echo $__env->make('modulos.patients.tabs.tab4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<!-- Tab #5 -->
	<?php echo $__env->make('modulos.patients.tabs.tab5', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div> <!-- end: Tab Content -->           

<div class="form-group">
    <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary pull-right']); ?> 	
</div>

