<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
					<div class="well well-sm"><span class="titlePage">Crear Nuevo Paciente:</span></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel-body">                                    
                                    <?php if($errors->any()): ?>
                                        <ul class="alert alert-danger">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php echo Form::open(['url' => '/modulos/patients', 'class' => 'form', 'files' => true]); ?>

                                        <?php echo $__env->make('modulos.patients.form',['fecha_actual' => date('Y-m-d') ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <a href="<?php echo e(url('/modulos/patients')); ?>">
                                        <button type="button" class="btn btn-primary">
                                            <i class="material-icons">arrow_back</i>Regresar
                                        </button>
                                    </a>
										<?php echo Form::hidden('created_user', Auth::user()->username, ['class' => 'form-control']); ?>

                                        <?php echo Form::hidden('id_empresa', $id_empresa, ['class' => 'form-control']); ?>

                                        <?php echo Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']); ?>										
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

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">

        $('.form_date').datetimepicker({
            language:  'es',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });

        $(document).ready(function () {
            $('#dpto_cmb').change(function () {
                var cat_id = $(this).val();
                // console.log(cat_id);
                var div = $(this).parent();
                var op = '<label class="control-label">Municipio</label>';
                op += '<select class="form-control" name="id_area" id="id_area">';
                $.ajax({
                    type: 'GET',
                    url: '<?php echo URL::to('/findAreaPadre'); ?>',
                    data: {'id': cat_id},
                    dataType: 'json',
                    success: function (data) {
                        op += '<option value="0" selected disabled>Seleccione Area</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nomarea + '</option>';
                        }
                        op += '</select>'
                        op += "<?php echo $errors->first('id_area', '<p class="help-block">:message</p>'); ?>";
                        $("#div_municipio").empty();
                        $("#div_municipio").append(op);
                    }
                });
            });

            $('#dpto_cmb_contact').change(function () {
                var cat_id = $(this).val();
                // console.log(cat_id);
                var div = $(this).parent();
                var op = '<label class="control-label">Municipio</label>';
                op += '<select class="form-control" name="contact_city" id="contact_city">';
                $.ajax({
                    type: 'GET',
                    url: '<?php echo URL::to('/findAreaPadre'); ?>',
                    data: {'id': cat_id},
                    dataType: 'json',
                    success: function (data) {
                        op += '<option value="0" selected disabled>Seleccione Area</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nomarea + '</option>';
                        }
                        op += '</select>'
                        op += "<?php echo $errors->first('contact_city', '<p class="help-block">:message</p>'); ?>";
                        $("#div_municipio_contact").empty();
                        $("#div_municipio_contact").append(op);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>