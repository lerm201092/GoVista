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
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('css/material-kit.css')); ?>" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo e(asset('css/demo.css')); ?>" rel="stylesheet"/>
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
            <a href="#">
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

<!-- Sart Modal -->
<?php echo $__env->yieldContent('content_user'); ?>
<!--  End Modal -->

<div class="wrapper">
    <div class="header header-filter" style="background-image: url(<?php echo e(asset('img/bg1.jpg')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="brand">
                        <img src="<?php echo e(asset('img/GO-VISTA-LOGO-426-113.png')); ?>" alt="Logo GO Vista">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <a name="aref_que_es"></a>
    <div class="main main-raised">
        <nav class="navbar navbar-warning">
            <div class="container">
                <div class="navbar-header">
                    <h1>¿Qué es?</h1>
                    <h3>
                        <p>Ciencia y tecnología se unen para crear en Colombia la primera plataforma tecnológica que
                            revoluciona el sector de la Salud Visual con una solución única e innovadora que brinda una
                            experiencia inmersiva que permite reducir los tiempos de la terapia visual.</p>
                        <p>Govista es 100% online y permite la asignación, realización y el seguimiento de ejercicios
                            para la terapia visual utilizando el poder de los videojuegos e integrándolos con las
                            técnicas y conceptos ya conocidos de los ejercicios visuales tradicionales.</p>
                    </h3>
                </div>
                <a name="aref_experiencia"></a>
            </div>

        </nav>
        <!-- End Navbar Info -->

        <!-- Navbar Primary  -->
        <nav class="navbar navbar-primary">
            <div class="container">
                <div class="navbar-header center-block">
                    <h1>Vive la Experiencia</h1>
                    <h3 class="text-center">
                        <p>Más del 10% de las personas en el mundo tiene problemas en su
                            función visual y viven sin saberlo.</p>

                        <p>Hoy es posible una solución para todos; también para los que más
                            quieres.</p>
                    </h3>
                </div>
            </div>
        </nav>
        <!-- End Navbar Primary -->

        <div class="section section-tabs"
             style="background-image: url(<?php echo e(asset('img/bg2.jpg')); ?>); background-size: cover; background-position: top center; min-height: 700px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-primary">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active text-center">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/cerca_de_ti.png')); ?>" alt="Cerca de Ti">
                                                </a>
                                                <h3>Cerca de Ti</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile1">
                                        <p> En la comodidad de tu casa, colegio o cualquier lugar, en tu computador,
                                            tablet o móvil. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-info">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs">
                                            <li class="active center-block">
                                                <a href="#profile2" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/rapido_sin_esperas.png')); ?>"
                                                         alt="Rápido y sin espera">
                                                </a>
                                                <h3>Rápido y Sin esperas</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile2">
                                        <p> Sesiones y ejercicios programados por su médico de acuerdo a sus
                                            necesidades</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-success">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/diagnostico_medico.png')); ?>"
                                                         alt="Diagnóstico Integral">
                                                </a>
                                                <h3>Diagnóstico Integral</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile3">
                                        <p>Nuestras clínicas y médicos asociados realizarán un diagnóstico previo y
                                            según los parámetros clínicos, asignando los ejercicios más apropiado para
                                            el paciente.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-warning">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/economico.png')); ?>"
                                                         alt="Económico y accesible">
                                                </a>
                                                <h3>Económico y accesible</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile4">
                                        <p> Sin costos de traslados de su hogar al consultorio de su médico.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a name="aref_paciente"></a>
                        <!-- End Tabs with icons on Card -->
                    </div>
                </div>
            </div>

        </div>
        <!-- End Section Tabs -->


        <!-- Navbar Danger -->
        <!--<div style="margin-top:1%"></div>-->
        <nav class="navbar navbar-danger">
            <div class="container">
                <div class="navbar-header center-block">
                    <h1>Soy Paciente</h1>
                    <h3 class="text-center">
                        <p>Muchos problemas funcionales de la visión mejoran con terapia visual
                            GoVista tiene la solución.</p>
                        <p>Ante todo la salud es lo más importante.</p>
                    </h3>
                </div>
            </div>
        </nav>


        <div class="section section-tabs"
             style="background-image: url(<?php echo e(asset('img/bg6.jpg')); ?>); background-size: cover; background-position: top center; min-height: 700px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-info">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs">
                                            <li class="active center-block">
                                                <a href="#profile2" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/salud_visual.png')); ?>"
                                                         alt="Salud Visual">
                                                </a>
                                                <h3>Salud visual</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile2">
                                        <p> La salud visual es el correcto funcionamiento de ojos, nervios, músculos que
                                            intervienen en el proceso de la visión</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>


                    <div class="col-md-4">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-primary">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs">
                                            <li class="active center-block">
                                                <a href="#profile2" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/ejercicios_personalizados.png')); ?>"
                                                         alt="Rápido y sin espera">
                                                </a>
                                                <h3>Ejercicios Interactivos</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile2">
                                        <p> Videojuegos especializados en terapia visual de acuerdo al diagnóstico
                                            médico</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-4">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-success">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/sesiones_personalizadas.png')); ?>"
                                                         alt="Diagnóstico Integral">
                                                </a>
                                                <h3>Sesiones Personalizadas</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile3">
                                        <p>Terapias que se ajustan a sus necesidades en tiempo real. Sesiones medibles,
                                            precisas y verificables de manera clara y objetiva.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a name="aref_clinica"></a>
                        <!-- End Tabs with icons on Card -->
                    </div>
                </div>
            </div>
        </div>

        <!--<div style="margin-top:1%"></div>-->
        <!-- Navbar Info -->
        <nav class="navbar navbar-success">
            <div class="container">
                <div class="navbar-header">
                    <h1>Soy una Clínica</h1>
                    <h3 class="text-center">
                        <p>Tecnología aplicada de forma Revolucionaria en el sector de la Salud Visual</p>
                    </h3>
                </div>
            </div>
        </nav>

        <div class="section section-tabs"
             style="background-image: url(<?php echo e(asset('img/bg8.jpg')); ?>); background-size: cover; background-position: top center; min-height: 700px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-warning">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs">
                                            <li class="active center-block">
                                                <a href="#profile2" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/personas.png')); ?>"
                                                         alt="Salud Visual">
                                                </a>
                                                <h3>Personas</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile2">
                                        <p> Hemos reclutado a las personas más capacitadas en áreas de la tecnología,
                                            investigación y la salud para ofrecerles la mejor experiencia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>

                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-success">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs">
                                            <li class="active center-block">
                                                <a href="#profile2" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/informatica.png')); ?>"
                                                         alt="Rápido y sin espera">
                                                </a>
                                                <h3>Informática</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile2">
                                        <p> Hemos creado y patentado un sistema inteligente que garantiza la calidad y
                                            efectividad de sus ejercicios</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-primary">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/analisis.png')); ?>">
                                                </a>
                                                <h3>Análisis</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile3">
                                        <p>Múltiples parámetros permitirán analizar tus datos y tu progreso; el médico
                                            tratante tendrá una información en tiempo real de tus avances</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-danger">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/seguridad.png')); ?>">
                                                </a>
                                                <h3>Seguridad</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile3">
                                        <p>Cuidamos la seguridad y privacidad de tus datos con todas las garantías
                                            legales, adicionalmente contamos on el mejor software de protección de
                                            datos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                </div>
            </div>
            <a name="aref_juegos"></a>
        </div>

        <!--<div style="margin-top:1%"></div>-->
        <!-- Navbar Info -->
        <nav class="navbar navbar-primary">
            <div class="container">
                <div class="navbar-header center-block">
                    <h3 class="text-center">
                        ¿Porqué Videojuegos?
                    </h3>
                </div>
            </div>
        </nav>

        <div class="section section-tabs"
             style="background-image: url(<?php echo e(asset('img/bg9.jpg')); ?>); background-size: cover; background-position: top center; min-height: 700px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-danger">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs">
                                            <li class="active center-block">
                                                <a href="#profile2" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/inmersion.png')); ?>">
                                                </a>
                                                <h3>Inmersión</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile2">
                                        <p>5 mínutos de experiencia inmersiva en videojuegos médicos pueden reemplazar
                                            60 mínutos de terapia visual</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>

                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-info">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs">
                                            <li class="active center-block">
                                                <a href="#profile2" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/atencion.png')); ?>">
                                                </a>
                                                <h3>Más atención</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile2">
                                        <p> Los videojuegos estimulan la atención y todo el sistema visual y cognitivo;
                                            no solo los ojos tambié el cerebro interactua</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-success">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/mas_rapido.png')); ?>">
                                                </a>
                                                <h3>Más Rápido</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile3">
                                        <p>Los videojuegos nos permiten concentrar en poco mínutos los estímulos
                                            necesarios para una medición médica exhaustiva</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                    <div class="col-md-3">
                        <!-- Tabs with icons on Card -->
                        <div class="card card-nav-tabs">
                            <div class="header header-warning">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#" data-toggle="tab">
                                                    <img src="<?php echo e(asset('img/mas_efectivo.png')); ?>">
                                                </a>
                                                <h3>Más efectivo</h3>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="profile3">
                                        <p>Los videojuegos se adaptan a tus necesidades en función de su evolución
                                            durante la sesión</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs with icons on Card -->
                    </div>
                </div>
            </div>
        </div>


        <div class="section" id="carousel">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <!-- Carousel Card -->
                        <div class="card card-raised card-carousel">
                            <div id="carousel-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#" data-slide-to="0" class="active"></li>
                                        <li data-target="#" data-slide-to="1"></li>
                                        <li data-target="#" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="img/bg3.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="img/bg4.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="img/bg5.jpg">
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
                                        <i class="material-icons">keyboard_arrow_left</i>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-generic" data-slide="next">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Carousel Card -->

                    </div>
                </div>
            </div>
        </div>
        <a name="aref_contactenos"></a>
        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">Contáctenos</h2>
                    <h4 class="text-center description">
                        Muchas gracias por contactarnos, favor dejar su nombre, email, inquietudes, observaciones o
                        consultas sobre nuestros recursos y servicios, con gusto estaremos prestos a responderle
                        lo más pronto posible.</h4>

                        <?php if($errors->any()): ?>
                            <ul class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <?php echo Form::open(['url' => '/contacts', 'class' => 'contact-form', 'files' => true]); ?>

                            <?php echo $__env->make('modulos.contacts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::close(); ?>

                </div>
            </div>
        </div>

        <br>
        <div class="container">
            <div class="main main-raised">
                <div class="row">
                    <div class="col-md-3 center-block">
                        <img src="<?php echo e(asset('img/MinTIC.png')); ?>" class="img-responsive center-block">
                    </div>
                    <div class="col-md-2 center-block">
                        <img src="<?php echo e(asset('img/vivedigital.png')); ?>" class="img-responsive center-block">
                    </div>
                    <div class="col-md-2 center-block">
                        <br>
                        <img src="<?php echo e(asset('img/appco.png')); ?>" class="img-responsive center-block">
                    </div>
                    <div class="col-md-3 center-block">
                        <img src="<?php echo e(asset('img/colciencias.png')); ?>" class="img-responsive center-block">
                    </div>
                    <div class="col-md-2 center-block">
                        <img src="<?php echo e(asset('img/unnuevopais.png')); ?>" class="img-responsive center-block">
                    </div>

                </div>
            </div>
        </div>
        <br>
        <br>


    </div>


  <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Acerca de
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                 &copy; 2016, made with <i class="material-icons">favorite</i> by Creative Tim for a better web.
            </div>
        </div>
    </footer> 
</div>
<a href="#" class="boton-top"><p align=center><strong>Ir Arriba</strong></a></p>


</body>
<!--   Core JS Files   -->
<script src="js/jquery.min.js" type="text/javascript"></script>
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
