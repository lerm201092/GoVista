<?php echo Form::hidden('id', null, ['class' => '','disabled' ]); ?>

<?php echo Form::hidden('id_appointment', isset($id_appointment) ? $id_appointment : null, ['class' => '']); ?>

<?php echo Form::hidden('id_patient', isset($id_patient) ? $id_patient : null, ['class' => '']); ?>

<?php echo Form::hidden('id_medico', isset($id_medico) ? $id_medico : null, ['class' => '']); ?>

<?php echo Form::hidden('historydate', isset($historydate) ? $historydate : date("Y-m-d H:i "), ['class' => '']); ?>

<?php echo Form::hidden('id_centromedico', '1', ['class' => '']); ?>

<?php echo Form::hidden('state', 'AC', ['class' => '']); ?>

<?php echo Form::hidden('title', isset($title) ? $title : null, ['class' => '']); ?>

<?php echo Form::hidden('body', isset($body) ? $body : null, ['class' => '']); ?>


<a href="<?php echo e(url('/modulos/histories')); ?>">
    <button type="button" rel="tooltip" title="Regresar" class="btn btn-primary btn-sm" data-background-color="orange">
        <i class="material-icons">arrow_back</i>
    </button>
</a>

<span id="separator"> </span>
<button type="submit" value="saveContinue" id="saveContinue" name="saveContinue" class="btn btn-primary btn-sm" data-background-color="green" rel="tooltip" title="Guardar y Continuar">
    <i class="material-icons">save_alt</i>Guardar y Continuar
</button>

<button type="submit" value="saveExercise" id="saveExercise" name="saveExercise" class="btn btn-primary btn-sm" data-background-color="green" rel="tooltip" title="Guardar y Asignar Ejercicio">
    <i class="material-icons">save_alt</i>Guardar y Asignar Ejercicio
</button>

<button type="submit" value="saveAllExit" id="saveAllExit" name="saveAllExit" class="btn btn-primary btn-sm" data-background-color="green" rel="tooltip" title="Finalizar">
    <i class="material-icons">save_alt</i>Finalizar
</button>

<!-- begin: Nav tabs -->
<span class="form-group label-floating"> <input id="tabIDHistory" name="tabIDHistory" type="hidden" /> </span> <!-- default: tabIDHistory -->
<ul id="main-tabs" class="nav nav-tabs" role="tablist" data-background-color="purple">
    <li id="1" style="text-align: center !important;">
        <a data-id="1" href="#tab_1" role="tab" data-toggle="tab"> Antecedentes <br> Medicos </a>
    </li>

    <li id="2" style="text-align: center !important;">
        <a data-id="2" href="#tab_2" role="tab" data-toggle="tab"> Anamnesis <br>&nbsp; </a>
    </li>

    <li id="3" style="text-align: center !important;">
        <a data-id="3" href="#tab_3" role="tab" data-toggle="tab"> Agudeza Visual <br> (AV) </a>
    </li>

    <li id="4" style="text-align: center !important;">
        <a data-id="4" href="#tab_4" role="tab" data-toggle="tab"> Funcional <br> optometría </a>
    </li>

    <li id="5" style="text-align: center !important;">
        <a data-id="5" href="#tab_5" role="tab" data-toggle="tab"> Motilidad <br> Ocular </a>
    </li>

    <li id="6" style="text-align: center !important;">
        <a data-id="6" href="#tab_6" role="tab" data-toggle="tab"> Diagnostico <br>&nbsp; </a>
    </li>

    <li id="7" style="text-align: center !important;">
        <a data-id="7" href="#tab_7" role="tab" data-toggle="tab"> Asignar Ejercicios </a>
    </li>
</ul>
<!-- end: Nav tabs -->

<div class="tab-content"> <!-- begin: Tab Content -->

    <!-- Tab #1 -->
	<?php echo $__env->make('modulos.histories.tabs.tab1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
    <!-- Tab #2 -->
	<?php echo $__env->make('modulos.histories.tabs.tab2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Tab #3 -->
	<?php echo $__env->make('modulos.histories.tabs.tab3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Tab #4 -->
	<?php echo $__env->make('modulos.histories.tabs.tab4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<!-- Tab #5 -->
	<?php echo $__env->make('modulos.histories.tabs.tab5', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <!-- Tab #6 -->
	<?php echo $__env->make('modulos.histories.tabs.tab6', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <!-- Tab #7 -->
	<?php echo $__env->make('modulos.histories.tabs.tab7', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div> <!-- end: Tab Content -->

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	$(document).ready(function() {	
	 <?php if(Session::has('tabIDHistory')): ?> 
     <?php  $tabID = strtolower(Session::get('tabIDHistory'))  ?>
     var itemTab = <?php echo e($tabID = ($tabID == 7)? $tabID : ($tabID+1)); ?>;
	 $('#main-tabs li:eq('+ (itemTab-1) +") a").tab('show');
     <?php else: ?>
     $('#main-tabs li:eq(0) a').tab('show');
     <?php endif; ?>
    });
	
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {   
    var idTab = $(this).data("id");
	document.getElementById("tabIDHistory").value = idTab;    
    }); 
</script>
<?php $__env->stopSection(); ?>