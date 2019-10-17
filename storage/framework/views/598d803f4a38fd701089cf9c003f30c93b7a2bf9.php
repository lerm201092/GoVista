<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="pragma" content="no-cache" />
	<title>GoVista</title>
</head>
<body>
<p style="text-align: left !important;"><b>Hola!ccccc</b></p>
<p style="text-align: left !important;">Recibimos una solicitud de restablecimiento de contraseña para su cuenta, haga clic en el siguiente botón para elegir una nueva contraseña.</p>
<a style="border:none !important;border-radius:4px;display:inline-block;font-size:14px;font-weight:bold;line-height:24px;padding:10px;text-align:center;text-decoration:none!important;color:#fff!important;background-color:#3097d1;font-weight:bold !important;" target="_blank" href="<?php echo URL::to('/password/reset/'); ?>/<?php echo e($tokenReset); ?>">Resetear Contraseña</a>  
<p>Por razones de seguridad, este enlace de "Resetear Contraseña" caducará en 24 horas. Si no hace nada, su contraseña seguirá siendo la misma.</p>
<p>Si tiene problemas para hacer clic en el botón "Resetear Contraseña", copie y pegue la siguiente URL en su navegador web.</p>
<p><?php echo URL::to('/password/reset/'); ?>/<?php echo e($tokenReset); ?></p>
<p style="text-align: left !important;">Si no solicitó un restablecimiento de contraseña, por favor ignorar este mensaje.</p>
<div style="text-align:left !important;" id="mailable">
<p style="text-align: left !important;"><u>Equipo de Soporte GoVista <br><a href="https://www.govistalab.com" target="_blank">https://www.govistalab.com</a></u></p>
<img src="https://www.govistalab.com/apps/img/logo-go-vista-png-150x50.png" width="150" height="50" /> 
</div>
</body>
</html>