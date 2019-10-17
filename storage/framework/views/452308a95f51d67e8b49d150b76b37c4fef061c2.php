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
					<div class="well well-sm"><span class="titlePage">Carrito De Compras:</span></div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
						<?php if(session('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="container">
						<br>
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

				<!-- Module Shopping Cart -->				
				<?php if(\Cart::count() > 0): ?>
				<div class="row">
                <div class="col-md-8">
				<div class="row">
              <div class="col-md-12">       
		      <!-- being: content cart details -->
		      <table id="summaryOrders" class="table">
   	<thead>
       	<tr>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Producto</th>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Cantidad</th>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Precio</th>
           	<th style="background: #8e24aa !important;color: white !important;font-weight: bold !important;text-transform: uppercase !important;">Subtotal</th>
       	</tr>
   	</thead>
   	<tbody>
   		<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       		<tr>
           		<td>
               		<?php echo e($row->name); ?>               		
           		</td>
           		<td>				
				<select onchange="javascript:listqtyUpdate(<?php echo e($row->id); ?>);" style="width: 60px !important;" class="form-control" id="listqty_<?php echo e($row->id); ?>" name="listqty_<?php echo e($row->id); ?>">
				<?php for($x = 1; $x <= 10; $x++): ?>
				<option value="<?php echo e($x); ?>" <?php echo e(($row->qty == $x)? "selected" : ""); ?>><?php echo e($x); ?></option>
				<?php endfor; ?>
                </select> 
		        </td>		
           		<td>$ <?php echo e(number_format($row->price)); ?></td>
           		<td>$ <?php echo e(number_format($row->total)); ?></td>
				<td>
			<a href="<?php echo e(url('remove-to-cart/'.$row->id)); ?>" style="background:#f44336 !important;" class="btn btn-primary btn-xs" role="button"><i class="material-icons">delete_forever</i></a>
			</td>
       		</tr>
	   	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   	</tbody>   	
   	<tfoot>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td style="text-transform: uppercase !important;">Subtotal</td>
   			<td>$ <?php echo e(Cart::subtotal()); ?></td>
   		</tr>   		
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td style="text-transform: uppercase !important;">Total</td>
   			<td>$ <?php echo e(Cart::total()); ?></td>
			<td>&nbsp;</td>
   		</tr>		
   	</tfoot>	
</table>
<a href="<?php echo e(route('productList')); ?>" style="background:#8e24aa !important;" class="btn btn-md btn-primary" role="button">Continuar Comprando</a>
 <!-- end: content cart details -->
        </div>
      </div>      
    </div> 
    <div style="border:1px solid #eee !important;text-align: left !important;" class="col-md-4">
<!-- begin: content summary -->
 <p style="text-align: center !important;text-transform:uppercase !important;"><b><u>Resumen de tu compra:</u></b></p>
 <table class="table"> 
 <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form id="formHidden"> 
 <input name="TotalSesiones[]" type="hidden" value="<?php echo e($row->options->sesiones * $row->qty); ?>" />
 <input name="descItem[]"  type="hidden" value="<?php echo e($row->name .' ('. $row->qty .')'); ?>" />
</form>
       		<tr>
           		<td>
               		<p><strong><?php echo e($row->name); ?> <b style="font-weight: normal !important;font-size: 14pt !important;">x <?php echo e($row->qty); ?> </b></strong></p>               		
           		</td>
				<td>
               		<p><strong>$ <?php echo e(number_format($row->price)); ?></strong></p>               		
           		</td> 
       		</tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <tr>
 <td>
 <p style="text-transform: uppercase !important;font-weight: bold !important;">Subtotal</p>
 </td>
 <td>
 <p><span style="font-weight: normal !important;color: #ea2840 !important;">$ <?php echo e(Cart::subtotal()); ?></span></p>
 </td>
 </tr> 
 <tr>
 <td>
 <p style="text-transform: uppercase !important;font-weight: bold !important;">Total </p> 
 </td>
 <td>
 <p><span style="font-weight: normal !important;color: #ea2840 !important;">$ <?php echo e(Cart::total()); ?></span></p> 
 </td>
 </tr> 
 </table>
  <div style="text-align: center !important;">
 <hr>
 <?php 
    $amount   = str_replace(",","", Cart::total());
	$amount   = preg_replace("/\.?0*$/",'',$amount);
	$refCode  = md5(time());
	$signHASH = "";	
	if (env('MODE_TEST_PAYU') == true) {
	$sign     = env('TEST_API_KEY')."~".env('TEST_MERCHANT_ID')."~".$refCode."~".$amount."~".env('CURRENCY');
	$signHASH = md5($sign);	
	} else {
	$sign     = env('API_KEY')."~".env('MERCHANT_ID')."~".$refCode."~".$amount."~".env('CURRENCY');
	$signHASH = md5($sign);	
	}
  ?> 
<form id="formPayU" name="formPayU" method="post" action="<?php echo e((env('MODE_TEST_PAYU') == true)? env('URL_TEST') : env('URL_PRODUCTION')); ?>" target="_self">
  <input name="merchantId"      type="hidden"  value="<?php echo e((env('MODE_TEST_PAYU') == true)? env('TEST_MERCHANT_ID') : env('MERCHANT_ID')); ?>" />
  <input name="accountId"       type="hidden"  value="<?php echo e((env('MODE_TEST_PAYU') == true)? env('TEST_ACCOUNT_ID') : env('ACCOUNT_ID')); ?>" />
  <input name="description"     type="hidden"  value="" id="descProducts" />
  <input name="referenceCode"   type="hidden"  value="<?php echo e($refCode); ?>" />
  <input name="amount"          type="hidden"  value="<?php echo e($amount); ?>" /> 
  <input name="tax"             type="hidden"  value="<?php echo e(env('TAX')); ?>" />
  <input name="taxReturnBase"   type="hidden"  value="<?php echo e(env('TAX_RETURN_BASE')); ?>" />
  <input name="currency"        type="hidden"  value="<?php echo e(env('CURRENCY')); ?>" />
  <input name="signature"       type="hidden"  value="<?php echo e((env('MODE_TEST_PAYU') == true)? $signHASH : $signHASH); ?>" />  
  <input name="test"            type="hidden"  value="<?php echo e((env('MODE_TEST_PAYU') == true)? 1 : 0); ?>" />
  <input name="buyerEmail"      type="hidden"  value="<?php echo e(auth()->user()->email); ?>" />
  <input name="buyerFullName"   type="hidden"  value="<?php echo e(auth()->user()->nombres .' '. auth()->user()->apellidos); ?>" />
  <input name="responseUrl"     type="hidden"  value="<?php echo URL::to('/payuresponse'); ?>" />
  <input name="confirmationUrl" type="hidden"  value="<?php echo URL::to('/payuconfirmation'); ?>" /> 
  <input style="background:#8e24aa !important;" class="btn btn-md btn-primary" type="button" id="submitBtn" value="Procesar Compra" /> 
</form>
 <hr> 
 <img style="width: 150px !important;height: 60px !important;" src="<?php echo e(asset('img/products/security_buye.jpg')); ?>" />
 <hr>
 <img style="width: 300px !important;height: 50px !important;" src="<?php echo e(asset('img/products/payupagosseguros.png')); ?>" />
 </div>
 <!-- end: content summary -->
    </div>
  </div>	 
<?php else: ?>
	<div style="text-align: center !important;" id="infoCart">
    <br><br>
	<i style="color:#8e24aa !important;font-size: 25pt !important;" class="material-icons">shopping_cart</i>	
	<h3 style="color:#8e24aa !important;">No tienes productos en tu carrito</h3>
	<hr>
	<h4>Haz clic en el botón <b>"Ir a Comprar"</b> si deseas adquirir alguno de nuestros paquetes.</h4>
	<hr>
	<br><br>
	<div class="btn-container col-md-4 col-md-offset-4">
          <a href="<?php echo e(route('productList')); ?>" style="background:#8e24aa !important;" class="btn btn-md btn-primary" role="button">Ir a Comprar</a>
    </div>
	<br><br>
	</div>
		<?php endif; ?>	
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
	
	$(document).ready(function(){  
    $("#submitBtn").click(function(e){ 
	    e.preventDefault();
        var totalSesiones = $("input[name='TotalSesiones[]']").map(function(){return $(this).val();}).get().join();	   
        var descProducts = $("input[name='descItem[]']").map(function(){return $(this).val();}).get().join();
		var _totalSesion_ = totalSesiones.split(",");
		var TotalSesion = null;
		for (x=0; x < _totalSesion_.length ;x++) { TotalSesion = (TotalSesion + Number(_totalSesion_[x])); }			
	    document.getElementById("descProducts").value = descProducts;
	    $.get("<?php echo URL::to('/saveProduct'); ?>", {
			    id_user: '<?php echo e(Auth::user()->id); ?>',
				description: descProducts,
				state_pol: 'En Espera',				
                ref_code: '<?php echo e(isset($refCode)? $refCode : ''); ?>',
				signature: '<?php echo e((env('MODE_TEST_PAYU') == true)? isset($signHASH)?$signHASH:'' : isset($signHASH)?$signHASH:''); ?>',
				value: '<?php echo e(isset($amount)? $amount : ''); ?>',
				Tsesiones: TotalSesion
            }, function (data, status) {
				if (data == "insert_ok") {	
				  $("#formPayU").submit(); // Submit the form
				}			
			});				
	});
    });
		
	function listqtyUpdate(id) {
		var listqty = document.getElementById("listqty_"+id);
		var qty = listqty.options[listqty.selectedIndex].value; 
		window.location = "./update-to-cart/"+id+'/'+qty;
	}; 
	</script>
	
	<!-- Alert message -->	
	<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
	}, 3000);
	</script>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>