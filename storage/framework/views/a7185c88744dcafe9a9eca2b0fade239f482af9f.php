<!-- SideBar -->
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">  
                <div class="card">	
					<div class="well well-sm">
					<span class="titlePage">
					Creación de Consulta Médica
                    <br>
					<b style="color: black !important;">Paciente:&nbsp;</b> <?php echo $appointments[0]->name1.' '.$appointments[0]->name2.' '.$appointments[0]->surname1.' '.$appointments[0]->surname2; ?> 
					<b style="padding-left: 20px;color: black !important;">Edad:&nbsp;</b> <?php echo $edadPaciente .' Años '; ?>

					<b style="padding-left: 20px;color: black !important;">Fecha Cita:&nbsp;</b> <?php echo $appointments[0]->historydate; ?>

					<b title="Ejercicios Activos" style="padding-left: 20px;color: black !important;"><i style="font-size: 14px !important;" class="material-icons">fitness_center</i>&nbsp;Activos:&nbsp;</b><?php echo e((isset( $qty_exe['AC'])) ? $qty_exe['AC'] : 0); ?>

					<b title="Ejercicios Realizados" style="padding-left: 20px;color: black !important;"><i style="font-size: 14px !important;" class="material-icons">fitness_center</i>&nbsp;Realizados:&nbsp;</b><?php echo e((isset( $qty_exe['OK'])) ? $qty_exe['OK'] : 0); ?>

                    </span>
					</div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12"> 
                                    <?php if($errors->any()): ?>
                                        <ul class="alert alert-danger">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>

                                    <?php echo Form::open(['url' => '/modulos/histories', 'id' => 'formMain', 'class' => 'form', 'files' => true ]); ?>

                                    <?php echo $__env->make('modulos.histories.form',
                                    [
                                        'id_appointment' => $appointments[0]->id,
                                        'id_medico' => $appointments[0]->id_medico,
                                        'nom_medico' => $appointments[0]->nom_medico,
                                        'documento' => $appointments[0]->tipodoc.'-'.$appointments[0]->numdoc,
                                        'id_patient' => $appointments[0]->id_patient,
                                        'apellidos' => $appointments[0]->surname1.' '.$appointments[0]->surname2,
                                        'nombres' => $appointments[0]->name1.' '.$appointments[0]->name2,
                                        'title' => $appointments[0]->title,
                                        'body' => $appointments[0]->body
                                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo Form::hidden('created_user', Auth::user()->username, null, ['class' => 'form-control']); ?>

                                    <?php echo Form::hidden('id_empresa', $id_empresa, null, ['class' => 'form-control']); ?>									
                                    <?php echo Form::hidden('updated_user', Auth::user()->username, ['class' => 'form-control']); ?>

                                    <?php echo Form::close(); ?>                              
                            </div>
                        </div>
                    </div>
                </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
		num = 0;

        function buscarExe1(cmbExercise_id) {
            var observacion = "";
            $.ajax({
                type: 'GET',
                url: '<?php echo URL::to('/findExerciseId'); ?>',
                data: {'id': cmbExercise_id},
                dataType: 'json',
                success: function (data) {
                    observacion = data[0].observation;

                },
                async: false
            });

            return observacion;
        }

        function findExercise(obj) {
            var cmbExercise_id = $("#cmb_exercise option:selected").val();
            var Exercise_text = "";
            var Exercise_Observ = "";
            $.get("<?php echo URL::to('/findExerciseId'); ?>", { id: cmbExercise_id },function(data){
                if(data.length>0){
                    Exercise_text = data[0].description;
                    Exercise_Observ = data[0].observation;
                    crear(obj, cmbExercise_id, Exercise_text, Exercise_Observ )
                }
            });
        }
        function crear(obj, cmbExercise_id, Exercise_text, observacion) {

            //var observacion = buscarExe(cmbExercise_id);
            //alert("Observaciones "+observacion);

            var x = document.getElementById("cmb_exercise");
            if (x.length > 0) {
                x.remove(x.selectedIndex);
                num++;
                fi = document.getElementById('fieldset_exercise'); // ponemos en el field
                contenedor = document.createElement('div');
                contenedor.id = 'div' + num;
                fi.appendChild(contenedor);
                var cElementos = '<div class="row" id="' + Exercise_text + '_' + cmbExercise_id + '" name="' + Exercise_text + '_' + cmbExercise_id + '">' +
                    '<div class="col-md-12">' +
                    '<div class="card card-stats">' +
                    '<div class="card-header" data-background-color="green">' +
                    '<i class="material-icons">fitness_center</i>' +
                    '</div>' +
                    '<div class="card-content">' +
                    '<p class="category">Datos</p>' +
                    '<h3 class="title">' + Exercise_text + '</h3>' +
                    '<button type="button" rel="tooltip" title="Borrar Programación de Ejercicio"' +
                    'class="btn btn-danger btn-round btn-just-icon" onclick="borrar(\'' + Exercise_text + '_' + cmbExercise_id + '\')">' +
                    '<i class="material-icons">clear</i>' +
                    '</button>' +
                    '<input name="id_exercise[]" type="hidden" value="' + cmbExercise_id + '">' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="col-md-12">' +
                    '<div class="row">' +
                    '<div class="col-md-12">' +
                    '<div class="form-group label-floating">' +
                    '<label class="control-label ">Descripción</label>' +
                    '<textarea class="form-control" disabled rows="3" name="observation" cols="50">'+ observacion +'</textarea>' +
                    '<input class="form-control" name="observation" type="hidden">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-4">' +
                    '<div class="form-group label-floating">' +
                    '<label class="control-label">Duración en Minutos</label>' +
                    '<input class="form-control" min="5" max="30" step="5" name="duration[]" id="duration[]" type="number" required="required">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group label-floating">' +
                    '<label class="control-label">Nro. de Sesiones</label><input class="form-control" min="1" max="10" name="session[]" id="session[]" type="number" required="required">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group label-floating">' +
                    '<label class="control-label">Frecuencia</label>' +
                    '<select class="form-control" name="frequency[]"><option value="SEM">Semanales</option><option value="QUI">Quincenales</option><option value="MEN">Mensuales</option></select>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-4">' +
                    '<div class="form-group label-floating">' +
                    '<label class="control-label">Pantalla</label>' +
                    '<select class="form-control" name="screen[]" id="screen[]"><option value="SFI">Sin Filtro</option><option value="FVE">Filtro Verde</option><option value="FRO">Filtro Rojo</option></select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group label-floating">' +
                    '<label class="control-label">Ojo Izquierdo</label>' +
                    '<select class="form-control" name="screen_left[]"><option value="SFI">Sin Filtro</option><option value="FVE">Filtro Verde</option><option value="FRO">Filtro Rojo</option></select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<div class="form-group label-floating">' +
                    '<label class="control-label">Ojo Derecho</label>' +
                    '<select class="form-control" name="screen_right[]"><option value="SFI">Sin Filtro</option><option value="FVE">Filtro Verde</option><option value="FRO">Filtro Rojo</option></select>' +
                    '</div></div></div></div></div></div></div></div>'

                $("#fieldset_exercise").append(cElementos);
            }
        }

        function borrar(obj) {
            var x = document.getElementById("cmb_exercise");
            var myStr = obj;
            var strArray = myStr.split("_");
            if (strArray.length > 0) {
                $('#cmb_exercise').append('<option value="' + strArray[1] + '" selected="selected">' + strArray[0] + '</option>');
            }
            fi = document.getElementById('fieldset_exercise');
            fi.removeChild(document.getElementById(obj));
        }

        /*
        function validar(obj) {
            var ok = false;
            var msg = "Debes escribir algo en los campos:\n";
            var eleControls = obj.elements["duration[]"];
            for (var i = 0; i < eleControls.length; i++) {
                if (eleControls[i].value == "") {
                    console.log('Valor duraction ' + i + ' Esta vacio');
                    ok = false;
                }
            }
            eleControls = obj.elements["session[]"];
            for (var i = 0; i < eleControls.length; i++) {
                if (eleControls[i].value == "") {
                    console.log('Valor session ' + i + ' Esta vacio');
                    ok = false;
                }
            }
            if (ok == false)
                alert(msg);
            return ok;
        }
        */
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>