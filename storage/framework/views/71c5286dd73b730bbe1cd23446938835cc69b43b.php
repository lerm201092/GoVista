<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Información</h4>
                        <p class="category">Paciente</p>
                    </div>
                    <?php echo Form::open(['url' => '/modulos/histories', 'class' => 'form', 'files' => true]); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                                <a href="<?php echo e(url('/modulos/histories')); ?>">
                                    <button type="button" rel="tooltip" title="Regresar"
                                            class="btn btn-warning btn-round btn-just-icon">
                                        <i class="material-icons">arrow_back</i>
                                    </button>
                                </a>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Documento</label>
                                            <?php echo Form::text('documento',$patient->tipodoc.' '.$patient->numdoc, ['class' => 'form-control','disabled']); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombres</label>
                                            <?php echo Form::text('nombres', $patient->name1.' '.$patient->name2, ['class' => 'form-control', 'disabled']); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Apellidos</label>
                                            <?php echo Form::text('apellidos', $patient->surname1.' '.$patient->surname2, ['class' => 'form-control', 'disabled']); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha Nacimiento</label>
                                            <?php echo Form::text('documento',$patient->birthdate, ['class' => 'form-control','disabled']); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Edad</label>
                                            <?php echo Form::text('documento',$edad, ['class' => 'form-control','disabled']); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Consultas Médicas</p>
                        <h3 class="title"><?php echo e($qty_citas[0]->qty); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">date_range</i>
                            Desde <?php echo e(date("Y-m-d",strtotime($qty_citas[0]->primera))); ?>

                            Hasta <?php echo e(date("Y-m-d",strtotime($qty_citas[0]->ultima))); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Activos</p>
                        <h3 class="title"><?php echo e((isset( $qty_exe['AC'])) ? $qty_exe['AC'] : 0); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-warning">fitness_center</i> Ejercicios programados Activos
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Incumplidos</p>
                        <h3 class="title"><?php echo e((isset( $qty_exe['IN'])) ? $qty_exe['IN'] : 0); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">info_outline</i> Ejercicios programados incumplidos
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">done_all</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Realizados</p>
                        <h3 class="title"><?php echo e((isset( $qty_exe['OK'])) ? $qty_exe['OK'] : 0); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">done_all</i> Ejercicios programados realizados
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="green">
                        <div class="ct-chart" id="VisualAcuityChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Agudeza Visual</h4>
                        <p class="category">Según la línea de Snellen.</p>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label"><span class="text-success">HC Nro.</span></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label"><span class="text-success">Fecha</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label class="control-label"><span class="text-success">Valor</span></label>
                                </div>
                            </div>
                            <?php for($i = 0; $i<$visual_acuity->count(); $i++): ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> <?php echo e($visual_acuity[$i]->id); ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label"><?php echo e(date("Y-m-d",strtotime($visual_acuity[$i]->historydate))); ?></label>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><?php echo e($visual_acuity[$i]->visual_acuity.' - '.$visual_acuity[$i]->value); ?></label>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="orange">
                        <div class="ct-chart" id="IntpupDistChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Distancia Interpupilar</h4>
                        <p class="category">Se mide en milímetros, valores óptimos 56 mm y 66 mm</p>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label"><span class="text-success">HC Nro.</span></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label"><span class="text-success">Fecha</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label class="control-label"><span class="text-success">Valor</span></label>
                                </div>
                            </div>
                            <?php for($i = 0; $i<$visual_acuity->count(); $i++): ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> <?php echo e($visual_acuity[$i]->id); ?></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label"><?php echo e(date("Y-m-d",strtotime($visual_acuity[$i]->historydate))); ?></label>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label"><?php echo e($visual_acuity[$i]->intpup_dist); ?></label>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            initVisualAcuityPageCharts();
            initIntpupDistPageCharts();
        });


        function initVisualAcuityPageCharts() {

            /* ----------==========     Agudeza Visual Chart initialization    ==========---------- */

            dataVisualAcuityChart = {
                labels: [<?php echo $serie1; ?>],
                series: [[<?php echo $serie2; ?>],
                    [<?php echo $serie3; ?>]]
            };

            optionsVisualAcuityChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: 15, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                chartPadding: {top: 0, right: 0, bottom: 0, left: 0},
            };
            var VisualAcuityChart = new Chartist.Line('#VisualAcuityChart', dataVisualAcuityChart, optionsVisualAcuityChart);
            md.startAnimationForLineChart(VisualAcuityChart);
        }

        function initIntpupDistPageCharts() {

            /* ----------==========     Distancia Interpupilar Chart initialization    ==========---------- */

            dataIntpupDistChart = {
                labels: [<?php echo $serie1; ?>],
                series: [[<?php echo $serie4; ?>],
                    [<?php echo $serie5; ?>]]
            };

            optionsIntpupDistChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 35,
                high: 80, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                chartPadding: {top: 0, right: 0, bottom: 0, left: 0},
            };
            var IntpupDistChart = new Chartist.Line('#IntpupDistChart', dataIntpupDistChart, optionsIntpupDistChart);
            md.startAnimationForLineChart(IntpupDistChart);
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>