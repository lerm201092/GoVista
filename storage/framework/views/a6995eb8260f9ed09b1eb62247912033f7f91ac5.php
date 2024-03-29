<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_user'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-signup">
                    <form name="formLogin" class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="header header-primary text-center">
                            <h4>ACCESOsss AL SISTEMA</h4>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </span>
                                <input id="username" type="text" class="form-control" placeholder="Usuario..."
                                       name="username" value="<?php echo e(old('username')); ?>" required autofocus
                                       onblur="txtUserName_onblur()">
                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                                <strong><?php echo e($errors->first('username')); ?></strong>
                                            </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                <input id="password" type="password" class="form-control"
                                       placeholder="Contraseña..." name="password" required>
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                <?php endif; ?>
                            </div>

                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">account_balance</i>
                                                </span>
                                <div class="form-group<?php echo e($errors->has('companies') ? ' has-error' : ''); ?>"
                                     id="div_companies"
                                     name="div_companies">
                                    <?php echo Form::select('companies', ["Empresas"] , null, ['class' => 'form-control','required']); ?>

                                </div>
                            </div>	
						<div id="forgetPasswd" style="text-align: right !important;">
                        <a href='<?php echo e(url("password/reset")); ?>'><i>¿Has olvidado tu contraseña?</i></a> 
						</div>	
                        </div>
                        <div class="footer text-center">
                            <button style="width: 95% !important;" type="submit" class="btn btn-primary btn-md btn-round">
                                Ingresar
                            </button>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                            
                        </div>
                    </form>
					 <div class="footer text-center">
					 <h5>No tengo una cuenta?</h5>
					 <a href='<?php echo e(url("register")); ?>'><p style="text-transform: uppercase !important;">Regístrate Ahora</p></a> 
					 </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">

        function txtUserName_onblur() {
            var op = '<select class="form-control" required name="companies" ><option value="" selected="selected">Empresa</option>';
            var txtUserName = $("#username").val();
            if (txtUserName.length > 0) {
                $.get("<?php echo e(asset('/findUserEmpresa')); ?>", {id: txtUserName})
                    .done(function (data) {
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id_empresa + '">' + ucwords(data[i].nombre) + '</option>';
                        }
                        op += '</select>';
                        $("#div_companies").empty();
                        $("#div_companies").append(op);
                    });
            }
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.newinicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>