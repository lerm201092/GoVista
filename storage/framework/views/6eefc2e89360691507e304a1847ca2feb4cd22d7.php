<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
<div class="container-fluid">          
                <div class="card">
				<div class="well well-sm"><span class="titlePage">Lista de Citas Registradas:</span></div>	                   
                    <!--Body-->
                    <div class="card-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card card-nav-tabs">
                                        <div data-background-color="purple" class="card-header" >
                                            <div class="nav-tabs-navigation">
                                                <div class="nav-tabs-wrapper">
                                                    <span class="nav-tabs-title"></span>
                                                    <ul class="nav nav-tabs" data-tabs="tabs" >
                                                        <li class="active">
                                                            <a href="#listado" data-toggle="tab" onclick="javascript:document.getElementById('calendar-Fullcalendar').style.visibility = 'hidden';">
                                                                <i class="material-icons">view_list</i>
                                                                Listado
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#calendario" data-toggle="tab" onclick="javascript:document.getElementById('calendar-Fullcalendar').style.visibility = 'visible';">                                                                																
                                                                <i class="material-icons">date_range</i>
                                                                Calendario
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="calendario">
                                                   <!-- (calendar-Fullcalendar) -->
                                                </div>
                                                <div style="padding: 20px !important;" class="tab-pane active" id="listado">
                                                    <?php if(Auth::user()->roluser<>4  ): ?>
                                                        <a href="<?php echo e(url('/modulos/appointments/create')); ?>"
                                                           class="btn btn-success btn-round btn-just-icon"
                                                           title="Crear Nueva Cita">
                                                            <i class="material-icons">add</i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php echo Form::open(['method' => 'GET', 'url' => '/modulos/appointments', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="search"
                                                               placeholder="Buscar...">
                                                        <button type="submit"
                                                                class="btn btn-info btn-round btn-just-icon">
                                                            <i class="material-icons">search</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </div>

                                                    <?php echo Form::close(); ?>

                                                    <table class="table">
                                                        <thead class="text-primary">
                                                        <!-- <th>ID</th> -->
                                                        <th style="font-weight: bold !important;">Paciente</th>
                                                        <th style="font-weight: bold !important;">Médico</th>
                                                        <th style="font-weight: bold !important;">Cita</th>
                                                        <th style="font-weight: bold !important;">Estado</th>
                                                        <th></th>
                                                        </thead>
                                                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <!-- <td><?php echo e($item->id); ?></td> -->
                                                                <td><?php echo e($item->name1.' '.$item->surname1); ?></td>
                                                                <td><?php echo e($item->name); ?></td>
                                                                <td><?php echo e($item->start); ?></td>
                                                                <td><?php echo e($item->state); ?></td>
                                                                <td class="td-actions text-right">
                                                                    <a href="<?php echo e(url('/modulos/appointments/' . Crypt::encrypt($item->id))); ?>"> 
                                                                        <button type="button" rel="tooltip"
                                                                                title="Ver Datos de la Cita"
                                                                                class="btn btn-info btn-simple btn-xs">
                                                                        <i class="material-icons">remove_red_eye</i>
                                                                        </button>
                                                                    </a>
                                                                    <?php if(Auth::user()->roluser<>4  ): ?>
                                                                        <a href="<?php echo e(url('/modulos/appointments/' . $item->id . '/edit')); ?>">
                                                                            <button type="button" rel="tooltip"
                                                                                    title="Editar Datos de la Cita"
                                                                                    class="btn btn-primary btn-simple btn-xs">
                                                                                <i class="material-icons">edit</i>
                                                                            </button>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </table>
                                                    <div class="pagination-wrapper"> <?php echo $appointments->appends(['search' => Request::get('search')])->render(); ?> </div>
                                                </div>
                                            </div>
											</div>
                                </div>
                            </div>                    
                    </div>					
					<div id="calendarUI" style="position: relative !important;bottom: 70px !important;padding:20px !important;visibility: hidden;">
					<?php echo $calendar->calendar(); ?>

                    <?php echo $calendar->script(); ?>

					</div>
					
                    <!-- End Body -->
                </div>
		
    </div>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>