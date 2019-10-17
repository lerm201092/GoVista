<!-- SideBar -->
<?php if(Auth::user()->roluser == 1  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(Auth::user()->roluser == 2  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>	
<?php endif; ?>
<?php if(Auth::user()->roluser == 3  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(Auth::user()->roluser == 4  ): ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('bar.sidebarmedico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content_body'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">			
					<div class="well well-sm"><span class="titlePage">Mi Perfil:</span></div>
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <?php if($errors->any()): ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php echo e($error); ?>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <form action="<?php echo e(route('profile.update')); ?>" method="POST" role="form" enctype="multipart/form-data">
									    <?php echo e(csrf_field()); ?>

										<div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">Nombre de Usuario</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="<?php echo e(old('username', auth()->user()->username)); ?>">
                                            </div>
                                        </div>	
									</div>	
									<div class="col-md-4">									
										 <div class="form-group row">
                                            <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="<?php echo e(old('nombres', auth()->user()->nombres)); ?>">
                                            </div>
                                        </div>	
									</div>
									<div class="col-md-4">										
										 <div class="form-group row">
                                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="<?php echo e(old('apellidos', auth()->user()->apellidos)); ?>">
                                            </div>
                                        </div>
										</div>
									</div>	

<div class="row">
                                        <div class="col-md-4">									
										 <div class="form-group row">
                                            <label for="tipodoc" class="col-md-4 col-form-label text-md-right">Tipo de Documento</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="<?php echo e(old('tipodoc', auth()->user()->tipodoc)); ?>">
                                            </div>
                                        </div>	
  </div>    
<div class="col-md-4">  
										<div class="form-group row">
                                            <label for="numdoc" class="col-md-4 col-form-label text-md-right">Numero de Documento</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="<?php echo e(old('numdoc', auth()->user()->numdoc)); ?>">
                                            </div>
                                        </div>
  </div>	
<div class="col-md-4">  
										<div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección</label>
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" value="<?php echo e(old('address', auth()->user()->address)); ?>">
                                            </div>
                                        </div>	
                                          </div>
  </div>
  
  <div class="row">
                                        <div class="col-md-4">                                        
										<div class="form-group row">
                                            <label for="movil" class="col-md-4 col-form-label text-md-right">Telefono</label>
                                            <div class="col-md-6">
                                                <input id="movil" type="text" class="form-control" name="movil" value="<?php echo e(old('movil', auth()->user()->movil)); ?>">
                                            </div>
                                        </div>
                                          </div>
 <div class="col-md-4"> 										
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                            <div class="col-md-6">
                                                <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email', auth()->user()->email)); ?>" disabled>
                                            </div>
                                        </div>
                                          </div>                                         
                                          <div class="col-md-4"> 
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Imagen de Perfil</label>
                                            <div class="col-md-4">	 
 <?php if(auth()->user()->image): ?>                                            
									        <img class="img-thumbnail" src="<?php echo e(auth()->user()->image); ?>">
                                        <?php else: ?>
                                            <i title="Usted no tiene imagen de perfil." style="cursor: help !important;color:red !important;font-size:18pt !important;" class="material-icons">not_interested</i>
                                        <?php endif; ?>                                            
                                            </div>
                                        </div>
                                         </div>
                                         
                                            </div> 

  <div class="row">
<div class="col-md-4"> 
                                        <div class="form-group row">
                                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Subir Imagen de Perfil</label>
                                            <div class="col-md-6">											
                                               <input multiple="" class="form-control inputFileHidden" type="file" name="profile_image" id="profile_image" />  
												<i class="material-icons">attach_file</i>																						
                                            </div>
                                        </div>
                                         </div>
 </div> 
 
                                            
                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>