<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="apple-touch-icon" sizes="96x46" href="<?php echo e(asset('assets/img/favicon.png')); ?>"/>
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>GoVista</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
    <!--  Material Dashboard CSS -->   
    <link href="<?php echo e(asset('assets/css/material-dashboard.css')); ?>" rel="stylesheet"/>
	
	
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo e(asset('assets/css/demo.css" rel="stylesheet')); ?> "/>
    <!--  CSS for Datepicker     -->
    <link href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" media="screen"/>

    <!--     Fonts and icons   -->
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/css.css?family=Roboto:400,700,300|Material+Icons')); ?>" rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?php echo e(asset('css/icon.css?family=Material+Icons')); ?>"/>

    <!--
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet'
          type='text/css'>
    -->

    <!--  -->
    <script src="<?php echo e(asset('assets/js/jquery-3.1.0.min.js')); ?>" type="text/javascript"></script>		
		
    <?php if(isset($calendarJs)): ?>
        <link href="<?php echo e(asset('css/fullcalendar.min.css')); ?>" rel="stylesheet"/>
        <link href="<?php echo e(asset('css/fullcalendar.print.min.css')); ?>" rel="stylesheet" media="print"/>
        <script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/fullcalendar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/es.js')); ?>"></script>
		<style>		
		#calendar-Fullcalendar {			
            margin: 20px auto;
		}
		.fc-button {
			background: #26b8f2 !important;
			color: white !important;
        }
		.fc-center {
			color: #26b8f2 !important;
			font-weight: bold !important;
			font-size: 0.7em !important;
		}
		.fc-widget-header {
			background: #26b8f2 !important;
			color: white !important;
		}
		.fc-widget-header a{
			color: white !important;
		}
		</style>		
    <?php endif; ?>
	
	<style>
    #scrollDown {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 30px;
		z-index: 99;
		font-size: 18px;
		border: none;
		outline: none;
		background-color: #9c27b0;
		color: white;
		cursor: pointer;
		padding: 12px;
		-webkit-border-radius: 50%; 
        -moz-border-radius: 50%; 
		border-radius: 50%;
	}
	#scrollDown:hover {
		background-color: #ba68c8;
	}
	</style>

    <?php echo $__env->yieldContent('content_styles1'); ?>

    <style>	
	/* Estilos GoVista (Custom) */
	.navbar-absolute {
		padding-top: 1px !important;
	}
	.main-panel > .content {
		margin-top: 28px !important;
	}
	.card-header {
		padding: 5px !important;
	}
	</style>
	
	<style>
	/* Custom Checkbox */
	.containerInput {
		display: block;
		position: relative;
		padding-left: 35px;
		margin-bottom: 12px;
		cursor: pointer;
		font-size: 22px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
	/* Hide the browser's default checkbox */
	.containerInput input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
		height: 0;
		width: 0;
	}
	/* Create a custom checkbox */
	.checkmark {
		position: absolute;
		top: 0;
		left: 0;
		height: 25px;
		width: 25px;
		background-color: #eee;
		border: 1px solid black;
	}
	/* On mouse-over, add a grey background color */
	.containerInput:hover input ~ .checkmark {
		background-color: #ccc;
	}
	/* When the checkbox is checked, add a blue background */
	.containerInput input:checked ~ .checkmark {
		background-color: #2196F3;
	}
	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}
	/* Show the checkmark when checked */
	.containerInput input:checked ~ .checkmark:after {
		display: block;
	}
	/* Style the checkmark/indicator */
	.containerInput .checkmark:after {
		left: 9px;
		top: 5px;
		width: 5px;
		height: 10px;
		border: solid white;
		border-width: 0 3px 3px 0;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
	}
	
	
	
	
		body {
    background-color: #FFFFFF !important;
    color: #3C4858;
}
	.main-panel > .content {
		padding: 2px 0 !important;
	}


	#navbarDefault {
    border-bottom: 1px solid #9c27b0 !important;
}

.navbar-form {
    margin-top: 0px !important;
    margin-bottom: 21px;
    padding-left: 5px;
    padding-right: 5px;
}
.card .card-content {
    padding: 1px 20px !important;
}

.collapse.navbar-collapse.justify-content-end {

    background: #9c27b0;
    color: white !important;

}


.well {
	background: transparent !important;
	background: white;
	background-color: white;
color: #9c27b0 !important;
    padding: 5px !important;
}
.well.well-sm {

    text-align: left !important;

}
	
.titlePage {
	text-align: center !important;
text-transform: uppercase !important;
font-size: 10pt !important;
font-weight: bold !important;
}

	.alignleft {
	  float: left;
	  width:33.33333%;
	  text-align:left;
	}
	.aligncenter {
	  float: left;
	  width:33.33333%;
	  text-align:center;
	}
	.alignright {
	 float: left;
	 width:33.33333%;
	 text-align:right;
	}​
	
	
	
	/* custom tabs */
	.nav > li > a {
    color: #000 !important;
}
.cardTabs {	
	background: white !important;
border: 1px solid gray !important;
}


	</style>
		
</head>

<body>

<button onclick="javascript:scrollUpPage();" id="scrollDown"> <i class="material-icons">keyboard_arrow_up</i> </button>

<div class="wrapper">
    <?php echo $__env->yieldContent('content'); ?>
    <div id="main-panel" class="main-panel" onscroll="javascript:scrollFunction();">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

<div class="collapse navbar-collapse justify-content-end">
				
<div id="navbarDefault">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <i style="color:#fff !important;position: relative !important;top: 5px !important;" class="material-icons">domain</i><span style="font-size: 14px !important;font-weight: bold !important;color: #fff !important;"><?php echo e(Session::get('id_empresa_nombre')); ?></span>
       </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      <ul class="nav navbar-nav navbar-right">	  
        <li class="nav-item"> 
                <a title="Total Sesiones" class="nav-link" href="javascript:void(0);" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                  <i style="color:#fff !important;font-size:18pt !important;" class="material-icons">remove_red_eye</i>
                  <span style="border: 1px solid #757575;background: white !important;color: black !important;font-size: 11px !important;" class="notification"><?php echo e((auth()->user()->total_sessiones != null)? auth()->user()->total_sessiones : '0'); ?></span>                 
                </a>               
              </li>
			  <li class="nav-item">   
                <a title="<?php echo e((\Cart::count() > 0)? 'Ir a Carrito De Compra' : 'Carrito Vacio'); ?>" class="nav-link" href="<?php echo e(route('viewcart')); ?>" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                  <i style="color:#fff !important;font-size:18pt !important;" class="material-icons">shopping_cart</i>
                  <span style="border: 1px solid #757575;background: white !important;color: black !important;font-size: 11px !important;" class="notification"><?php echo e(\Cart::count()); ?></span>                 
                </a>               
              </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php if(auth()->user()->image): ?>
								<img src="<?php echo e(auth()->user()->image); ?>" style="width: 24px; height: 24px; border-radius: 50%;">
							<?php else: ?>
								<i style="color:#fff !important;font-size:18pt !important;" class="material-icons">account_circle</i>
								<?php endif; ?>		
							<span style="color:#fff !important;" ><?php echo e(Auth::user()->nombres.' '.Auth::user()->apellidos); ?></span><span style="color:#fff !important;" class="caret"></span>								
                            </a>
          <ul class="dropdown-menu">
            <li>
                                <a href="<?php echo e(route('profile')); ?>"> <i class="material-icons">account_box</i> Mi Perfil</a>
            </li>
            <li>
                                <a href="<?php echo e(route('changePassword')); ?>"> <i class="material-icons">security</i> Cambiar Contraseña</a>
            </li>
			<li>
                                <a href="<?php echo e(route('productList')); ?>"> <i class="material-icons">shopping_cart</i> Comprar</a>
            </li>
			<li>
                                <a href="<?php echo e(route('detailspayments')); ?>"> <i class="material-icons">payment</i> Detalles De Pagos</a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
			<a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i> Salir
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                          style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
			</li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</div>



                    
					
                </div>
            </div>
        </nav>		
		
        <div class="content">
            <?php echo $__env->yieldContent('content_body'); ?>
        </div>

       <footer class="footerMain">	            
	    <div style="padding-left: 30px !important;text-align: left !important;font-size: 1.0em !important;color: black !important;text-transform: uppercase !important;">&copy; <script>document.write(new Date().getFullYear())</script> GoVista S.A.S. - Todos los derechos reservados.</div>
	   </footer>
	 
    </div>

</div>

<!-- Sart Modal -->
<?php echo $__env->yieldContent('content_modal'); ?>
<!--  End Modal -->
    <script type="text/javascript">
		var bt_scrollDown = document.getElementById("scrollDown");
		var mainPanel = document.getElementById("main-panel");
		function scrollFunction() {
			if (mainPanel.scrollTop > 20) { bt_scrollDown.style.display = "block"; } 
			else { bt_scrollDown.style.display = "none"; }
		};
		function scrollUpPage() {			
            $("#main-panel").animate({ scrollTop: 0 }, 500);
		};
	</script>
</body>

<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/material.min.js')); ?>" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="<?php echo e(asset('assets/js/chartist.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/chartist-plugin-axistitle.min.js')); ?>" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo e(asset('assets/js/bootstrap-notify.js')); ?>" type="text/javascript"></script>

<!-- Material Dashboard javascript methods -->
<script src="<?php echo e(asset('assets/js/material-dashboard.js')); ?>" type="text/javascript"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo e(asset('assets/js/demo.js')); ?>" type="text/javascript"></script>

<!-- Select2 !-->
<script src="<?php echo e(asset('assets/js/select2.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/i18n/es.js')); ?>" type="text/javascript"></script>

<!-- Material Dashboard DatePicker !-->
<script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.es.js')); ?>" type="text/javascript"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</html>
