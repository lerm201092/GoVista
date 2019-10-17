<?php $__env->startSection('content'); ?>
   <div class="container">
    <div class="row">
        <div class="col-md-12">
	

	
	<div id="modalMain" style="padding: 10px !important;width: auto !important;height: 500px !important;">
	<div style="color: black !important;" id="alertUI" lass="alert alert-info">
        <h6 style="text-align: center !important;font-weight: bold !important;color:white;">Terminos Y Condiciones</h6>
		<div class="row" style="text-align: center !important;">
	 <div class="col-md-12" style="text-align: center !important;">
                                  <center>
                                   <embed id="termsprivacy" src="./terms/Terminos_Y_Condiciones.pdf" width="960" height="640" type="application/pdf"> 
                                  </center>
                            </div>
	  </div>
</div>
</div>

	  </div>
	    </div>
		  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.newinicio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>