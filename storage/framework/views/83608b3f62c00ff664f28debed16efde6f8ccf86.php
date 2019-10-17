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

<?php  
$URL_CURRENT = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}"; 
 ?> 

<p style="text-align: left !important;"><b>Estimado/a</b></p>
<p style="text-align: left !important;">¡Gracias por unirte a la plataforma GoVista!</p>
<p style="text-align: left !important;">Por favor haz click en el siguiente link para activar tu cuenta.</p>
<a style="border:none !important;border-radius:4px;display:inline-block;font-size:14px;font-weight:bold;line-height:24px;padding:10px;text-align:center;text-decoration:none!important;color:#fff!important;background-color:#3097d1;font-weight:bold !important;" target="_blank" href="<?php echo URL::to('/activation/user/'); ?>/<?php echo e($tokenReset); ?>">Activar Mi Cuenta</a>  
<p>Si tiene problemas para hacer clic en el botón "Activar Mi Cuenta", copie y pegue la siguiente URL en su navegador web.</p>
<p><?php echo URL::to('/activation/user/'); ?>/<?php echo e($tokenReset); ?></p>
<br />
<div style="text-align:left !important;" id="mailable">
<p style="text-align: left !important;"><u>Equipo de Soporte GoVista <br><a href="https://www.govistalab.com" target="_blank">https://www.govistalab.com</a></u></p>
<img src="https://www.govistalab.com/apps/img/logo-go-vista-png-150x50.png" width="150" height="50" /> 
</div>
</body>
</html>