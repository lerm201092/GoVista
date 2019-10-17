<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 					
					<div class="well well-sm"><span class="titlePage">Lista de Pacientes Registrados:</span></div>					
                    <!--Body-->
                    <div class="card-content table-responsive">
                            <a href="<?php echo e(url('/modulos/patients/create')); ?>"
                               class="btn btn-success btn-round btn-just-icon"
                               title="Crear Nuevo Paciente">
                                <i class="material-icons">add</i>
                            </a>
                            <?php echo Form::open(['method' => 'GET', 'url' => '/modulos/patients', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

                            
							<div class="input-group">
								<button onclick="javascript:pacientesAll();" type="button" class="btn btn-warning btn-primary"><i class="material-icons">group</i>Todos</button>
                            </div>
							
							<div class="input-group">
								<button onclick="javascript:pacientesActivos();" type="button" class="btn btn-info btn-primary"><i class="material-icons">done_all</i>Activos</button>
                            </div>
							
							<div class="input-group">
								<button onclick="javascript:pacientesInactivos();" type="button" class="btn btn-danger btn-primary"><i class="material-icons">info_outline</i>Inactivos</button>
                            </div>
							
							<div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                <button type="submit" class="btn btn-info btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                            <?php echo Form::close(); ?>

                            <table id="tableMain" class="table">
                                <thead class="text-primary">
                                <!-- <th>ID</th> -->
                                <th>Tipo Doc.</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Municipio</th>
								<th>Estado</th>
                                <th></th>
                                </thead>
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e(($item->state == 'AC')? 'activeItem' : 'inactiveItem'); ?>">
                                        <!-- <td><?php echo e($item->id); ?></td> -->
                                        <td><?php echo e($item->tipodoc); ?></td>
                                        <td><?php echo e($item->numdoc); ?></td>
                                        <td><?php echo e(ucwords(mb_strtolower($item->name1.' '.$item->name2))); ?></td>
                                        <td><?php echo e(ucwords(mb_strtolower($item->surname1.' '.$item->surname2))); ?></td>
                                        <td><?php echo e(ucwords(mb_strtolower($item->munic.' ( '.$item->dpto.' )'))); ?></td>
										<td><?php echo e($item->state); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(url('/modulos/patients/' . $item->id)); ?>">
                                                <button type="button" rel="tooltip" title="Ver Datos del Paciente"
                                                        class="btn btn-info btn-simple btn-xs">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="<?php echo e(url('/modulos/patients/' . $item->id . '/edit')); ?>">
                                                <button type="button" rel="tooltip"
                                                        title="Editar Datos del Paciente"
                                                        class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $patients->appends(['search' => Request::get('search')])->render(); ?> </div>
                     
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
function pacientesActivos() {
	pacientesAll();
	$(".inactiveItem").css("display", "none"); 
};
function pacientesInactivos() {
	pacientesAll();
	$(".activeItem").css("display", "none");
};
function pacientesAll() {
	$(".activeItem").css("display", "revert"); 
	$(".inactiveItem").css("display", "revert");
};
    </script>
<?php $__env->stopSection(); ?>
 


<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>