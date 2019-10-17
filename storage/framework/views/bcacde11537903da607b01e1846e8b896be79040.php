<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="96x46" href="<?php echo e(asset('assets/img/favicon.png')); ?>"/>
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>GO Vista</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!--     Fonts and icons     -->
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/css.css?family=Roboto:400,700,300|Material+Icons')); ?>" rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?php echo e(asset('css/icon.css?family=Material+Icons')); ?>"/>

    <!--
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    -->

    <!-- CSS Files -->
	<link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('css/material-kit.css')); ?>" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo e(asset('css/demo.css')); ?>" rel="stylesheet"/>
	<style>
	body, .footerMain {
      background: #9c27b0 !important;
      color: white !important;
      font-weight: bold !important;
    }
	</style>
	
	<script src="<?php echo e(asset('assets/js/jquery-3.1.0.min.js')); ?>" type="text/javascript"></script>
		
</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://www.govista.com/">
                <div class="logo-container">
                    <div class="logo">
                        <img src="<?php echo e(asset('img/favicon.png')); ?>" alt="Logo GO Vista" rel="tooltip"
                             title="<b>GO Vista</b> -- <b>Equipo de Desarrollo</b>" data-placement="bottom"
                             data-html="true">
                    </div>
                </div>
            </a>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
    <div class="header header-filter" style="background-image: url(<?php echo e(asset('img/bg1.jpg')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-3">
                    <div class="brand">
                        <?php echo $__env->yieldContent('content_user'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>	 
</div>

</body>
<!--   Core JS Files   -->
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/material.min.js')); ?>" type="text/javascript"></script>

<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="js/material-kit.js" type="text/javascript"></script>  

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>

<script type="text/javascript">
    window.onload = function () {
        $('body,html').animate({scrollTop: 0}, 500);
        return false;
    };
    $('.boton-top').click(function () {
        $('body,html').animate({scrollTop: 0}, 500);
        return false;
    });

    function ucwords(str) {
        str = str.toLowerCase();
        return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
            function (s) {
                return s.toUpperCase();
            });
    }
</script>

<?php echo $__env->yieldContent('scripts'); ?>

</html>
