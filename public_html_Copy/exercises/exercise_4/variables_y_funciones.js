var LEVEL=1;
var VERDE=0x00ff00;
var ROJO=0xFF0000;
var OPACIDAD=0.7;
var score=0,minutos=0,segundos=0;

var Config={
	pantalla:'',
	dificultad:'',
	ojo_afectado:'',
	numero_sesion:'',
	tiempo:0
}
Config.pantalla=($_GET('pantalla')) ? $_GET('pantalla') : '';
Config.dificultad=($_GET('dificultad')) ? $_GET('dificultad') : 'baja';
Config.tiempo=($_GET('tiempo')) ? $_GET('tiempo') : 10;

switch(Config.dificultad){
	case 'baja':
		OFFSET_X=280;
		COLUMNAS=2;
	break;
	case 'media':
		OFFSET_X=220;
		COLUMNAS=3;
	break;
	case 'alta':
		OFFSET_X=160;
		COLUMNAS=4;
	break;
}

function $_GET(parameterName) {
	var result = null,
		tmp = [];
	location.search
		.substr(1)
		.split("&")
		.forEach(function (item) {
		  tmp = item.split("=");
		  if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
		});
	return result;
}

function gofull() {
	 if (game.scale.isFullScreen)
	{
		game.scale.stopFullScreen();
	}
	else
	{
		game.scale.startFullScreen(false);
	}


}

function random(min,max){
	return Math.floor(Math.random()*(max-min+1)+min);
}
function crear_btn_expan(){
	btn=game.add.button(game.width-33,game.height-35,'expandir',function(){
		gofull()
	})
	btn.fixedToCamera=true
	/*
	btn=game.add.button(game.width-33,game.height-70,'home',function(){
		game.state.start("menu",true,false)
	})
	btn.fixedToCamera=true;*/
}
function filtro_pantalla(){

	var configuracion={
		izquierda:{
			color:0,
			opacidad:OPACIDAD
		},
		derecha:{
			color:0,
			opacidad:OPACIDAD
		}
	};

	switch(Config.pantalla){

		case 'verde_verde':
			configuracion.izquierda.color=VERDE;
			configuracion.derecha.color=VERDE;
		break;
		case 'rojo_rojo':
			configuracion.izquierda.color=ROJO;
			configuracion.derecha.color=ROJO;
		break;
		case 'verde_rojo':
			configuracion.izquierda.color=VERDE;
			configuracion.derecha.color=ROJO;
		break;
		case 'rojo_verde':
			configuracion.izquierda.color=ROJO;
			configuracion.derecha.color=VERDE;
		break;
		/*
		case 'rojo_nada':
			alert('entro');
			configuracion.izquierda.color=ROJO;
			configuracion.derecha.color=0;
			configuracion.derecha.OPACIDAD=1;
		break;		
		*/
	}
	if(Config.pantalla!=''){
		graphics = game.add.graphics(0, 0);
		graphics.beginFill(configuracion.izquierda.color,configuracion.izquierda.opacidad);
		graphics.drawRect(0,0, game.width/2,game.height);
		graphics.fixedToCamera=true
		graphics.beginFill(configuracion.derecha.color,configuracion.derecha.opacidad);
		graphics.drawRect(game.width/2,0, game.width/2,game.height);
	}
}
/*
window.onbeforeunload = function (e) {
  var message = "No has terminado tu sesión, ¿deseas abandonarla?",
  e = e || window.event;
  // For IE and Firefox
  if (e) {
  e.returnValue = message;
  }

  // For Safari
  return message;
};*/