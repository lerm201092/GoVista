<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>GoVista</title>
</head>
<body>
<h1>GoVista</h1>
<p>Muchas gracias por contactarnos</p>

<p>Sus inquietudes, observaciones o consultas sobre nuestros recursos y servicios, serán respondidas lo más pronto posible.</p>
<p>Uno de nuestros asesores se comunicará con usted.</p>

<h4>Nombre: <?php echo e($contacto->name); ?></h4>
<h4>Email: <?php echo e($contacto->email); ?></h4>

<p align="center">
<h4>Mensaje:</h4>
</p>

<p><?php echo e($contacto->message); ?></p>


<p>Equipo de Soporte GoVista</p>

</body>
</html>



