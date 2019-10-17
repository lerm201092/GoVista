var game = new Phaser.Game(800, 600, Phaser.AUTO,'');

var opacity_screen_red=(localStorage.getItem("ninja_screen_red")) ? localStorage.getItem("ninja_screen_red") : 0;
var opacity_screen_blue=(localStorage.getItem("ninja_screen_blue")) ? localStorage.getItem("ninja_screen_blue") : 0;
var BLUE=0x0000FF;
var RED=0xFF0000;
var minutos=0,segundos=0;

var sonido_salto=[];
/*------------------ Funciones -------------------*/

function trim (str) {
  return str.replace(/^\s+|\s+$/gm,'');
}

function rgbaToHex (rgba) {
    var parts = rgba.substring(rgba.indexOf("(")).split(","),
        r = parseInt(trim(parts[0].substring(1)), 10),
        g = parseInt(trim(parts[1]), 10),
        b = parseInt(trim(parts[2]), 10),
        a = parseFloat(trim(parts[3].substring(0, parts[3].length - 1))).toFixed(2);

    return "#"+( r.toString(16) + g.toString(16) + b.toString(16) + (a * 255).toString(16).substring(0,2));
}

function crear_btn_expan(){
	var btn=game.add.button(game.world.width-70,600-70,'expand',function(){
		gofull()
	})
	btn.fixedToCamera=true;
	console.log(game.world.height);
	var btn2=game.add.button(game.world.width-70,600-140,'home',function(){
		game.state.start("menu",true,false)
	})
	btn2.fixedToCamera=true;
}

function randomIntFromInterval(min,max){
    return Math.floor(Math.random()*(max-min+1)+min);
}
function collectStar(player,star){
	star.kill();
	score+=10;
	scoreText.text='Puntaje: '+score;
	sonido_coin.play();
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
window.mobilecheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};
/*------------------ Estados del juego  -------------------*/
var estado_cargando={
	init:function(){
		game.stage.backgroundColor='#fff';
	},
	preload:function(){		
		
		game.load.image('square', 'assets/square.png');
		
		game.load.image('expand', 'assets/gui/expand.png');
		game.load.image('home', 'assets/gui/home.png');

		game.load.image('btn_jugar', 'assets/gui/btn_jugar.png');			
		game.load.image('btn_calibrar', 'assets/gui/btn_calibrar.png');	
		game.load.image('btn_atras', 'assets/gui/btn_atras.png');	
		
		game.load.spritesheet('palette_blue', 'assets/palette/blue.jpg',150,150);
		game.load.spritesheet('palette_red', 'assets/palette/red.jpg',150,150);
		
		game.load.image('star', 'assets/star.png');
		game.load.spritesheet('dude', 'assets/player.png',32,48);
		game.load.image('stone', 'assets/stone.png');
		game.load.image('stone2', 'assets/stone2.png');
		game.load.audio('salto1', 'assets/sound/salto1.ogg');
		game.load.audio('salto2', 'assets/sound/salto2.ogg');
		game.load.audio('coin', 'assets/sound/coin.wav');
		game.load.audio('suspenso', 'assets/sound/fase.mp3');
		this.texto=game.add.text(0,0,'Cargando...',{fontSize:'32px',fill:'#000',boundsAlignH: "center", boundsAlignV: "center"});
		this.texto.setShadow(3, 3, 'rgba(0,0,0,0.5)', 2);
		this.texto.setTextBounds(0, 100, 800, 100);
	},
	create:function(){
		game.world.setBounds(0,0,800,600);		
		sonido_salto[0]=game.add.audio('salto1');
		sonido_salto[1] =game.add.audio('salto2');
		sonido_coin=game.add.audio('coin');
		sonido_suspenso=game.add.audio('suspenso');
		sonido_suspenso.loop=true;
		sonido_suspenso.volume=0;
		//this.texto.text='Todo cargado';
		setTimeout(function(){
			game.state.start('menu');
		},500);
	}
}
/*----------------------- MENU -------------------*/
var estado_menu={
	init:function(){
		game.stage.backgroundColor='#fff';
		game.world.setBounds(0,0,800,600);	
		game.scale.fullScreenScaleMode = Phaser.ScaleManager.EXACT_FIT;
	},
	preload:function(){
		
	},
	create:function(){
		this.texto=game.add.text(0,0,'Usa las teclas de direccion para llegar hasta la cima',{fontSize:'24px',fill:'#000',boundsAlignH: "center", boundsAlignV: "center"});
		this.texto.setShadow(3, 3, 'rgba(0,0,0,0.5)', 2);
		this.texto.setTextBounds(0, 100, 800, 100);
		this.btn_jugar=game.add.button(game.world.centerX-95, 150, 'btn_jugar', this.click_jugar, this, 2, 1, 0);
		this.btn_jugar=game.add.button(game.world.centerX-125, 250, 'btn_calibrar', this.click_calibrar, this, 2, 1, 0);
		crear_btn_expan();
	},
	click_jugar:function(){
		game.state.start('jugar');
	},
	click_calibrar:function(){
		game.state.start('calibrar');
	}
};
/*----------------------------- CALIBRAR ---------------------------------*/
var estado_calibrar={
	init:function(){
		game.world.setBounds(0,0,800,600);		
	},
	create:function(){
		
		self=this;
		var texto=game.add.text(0,0,'Ajuste el nivel de rojo y azul.',
			{
				fontSize:'24px',
				fill:'#000',
				boundsAlignV: "center"
			});
		texto.setTextBounds(10,10, 800, 100);

		
		this.sl=game.add.sprite(650,300,'square');
		this.sl.tint=(BLUE);
		this.sl.alpha=(localStorage.getItem("ninja_screen_blue")/100)
		
		this.sr=game.add.sprite(650,0,'square');
		this.sr.tint=RED;
		this.sr.alpha=(localStorage.getItem("ninja_screen_red")/100)
		
	
		var sliders=game.add.group();
		//==============BARRA GRIS
		var g1=game.add.graphics(0,0);
    	g1.beginFill(0x848484,1);
    	g1.drawRect(0,0,400,10);
    	var barra_gris=g1.generateTexture();
    	g1.destroy();
    	var sprite_gris=game.add.sprite(0,0,barra_gris);
    	var sprite_gris_b=game.add.sprite(0,0,barra_gris);
		//============== Control rojo ==========//
		g1 = game.add.graphics(0, 0);
		g1.beginFill(0xFF0000,1);
    	g1.drawCircle(0,0,50);
    	this.c1=game.add.sprite(0,5,'');
    	this.c1.addChild(g1);
    	this.c1.inputEnabled=true;
    	this.c1.input.enableDrag();
    	this.c1.input.allowVerticalDrag = false;
    	this.c1.events.onDragStop.add(function(){
    		localStorage.setItem('ninja_screen_red',opacity_screen_red);
			this.sr.alpha=(opacity_screen_red/100)
    	},this);
    	//-------- Barra roja
    	g1=game.add.graphics(0,0);
    	g1.beginFill(0xFF0000,1);
    	g1.drawRect(0,0,1,10,false);
    	g1.endFill();
    	var crx=((opacity_screen_red/100)*400);
    	this.c1b=game.add.sprite(0,0,g1.generateTexture());
    	this.c1b.width=crx;
    	this.c1.x=crx;
    	g1.destroy();
    	//------------ Grupo rojo
    	this.control_rojo=game.add.group();
    	this.control_rojo.add(sprite_gris);
    	this.control_rojo.add(this.c1b);
    	this.control_rojo.add(this.c1);
    	this.control_rojo.position.set(0,0);
    	this.texto_opacidad_roja=game.add.text(450,-10,opacity_screen_red)
    	this.control_rojo.add(this.texto_opacidad_roja)
    	//=========================== Control azul ===============================//
		g1 = game.add.graphics(0, 0);
		g1.beginFill(BLUE,1);
    	g1.drawCircle(0,0,50);
    	this.c2=game.add.sprite(0,5,'');
    	this.c2.addChild(g1);
    	this.c2.inputEnabled=true;
    	this.c2.input.enableDrag();
    	this.c2.input.allowVerticalDrag = false;
    	this.c2.events.onDragStop.add(function(){
    		localStorage.setItem('ninja_screen_blue',opacity_screen_blue);
			this.sl.alpha=(opacity_screen_blue/100)
    	},this);
    	//-------- Barra azul
    	g1=game.add.graphics(0,0);
    	g1.beginFill(0x0101DF,1);
    	g1.drawRect(0,0,1,10,false);
    	g1.endFill();
    	var crx=((opacity_screen_blue/100)*400);
    	this.c2b=game.add.sprite(0,0,g1.generateTexture());
    	this.c2b.width=crx;
    	this.c2.x=crx;
    	g1.destroy();
    	//------------ Grupo azul
    	this.control_azul=game.add.group();
    	this.control_azul.add(sprite_gris_b);
    	this.control_azul.add(this.c2b);
    	this.control_azul.add(this.c2);
    	this.control_azul.position.set(0,100);
    	this.texto_opacidad_azul=game.add.text(450,-10,opacity_screen_blue)
    	this.control_azul.add(this.texto_opacidad_azul)

    	sliders.add(this.control_rojo)
    	sliders.add(this.control_azul)

    	sliders.position.set(20,100);

		
		crear_btn_expan()
	},
	update:function(){
		if(this.c1.input.isDragged){
			if(this.c1.x>400){
				this.c1.x=400;
			}
			if(this.c1.x<0){
				this.c1.x=0;
			}
			this.c1b.width=this.c1.x;
			opacity_screen_red=parseInt((this.c1.x*100)/400);
			this.texto_opacidad_roja.text=opacity_screen_red;
		}

		if(this.c2.input.isDragged){
			if(this.c2.x>400){
				this.c2.x=400;
			}
			if(this.c2.x<0){
				this.c2.x=0;
			}
			this.c2b.width=this.c2.x;
			opacity_screen_blue=parseInt((this.c2.x*100)/400);
			this.texto_opacidad_azul.text=opacity_screen_blue;
		}
	},
	render:function(){
		//game.debug.geom(this.sl,rgbaToHex("rgba(255,0,0,"+(localStorage.getItem('ninja_screen_red')/100)+")"));
		//game.debug.geom(this.sr,rgbaToHex("rgba(0,255,0,"+(localStorage.getItem('ninja_screen_blue')/100)+")"));
		
	}
}

/*----------------------------- PLAY -------------------*/
var estado_jugando={
	init:function(){
		//game.stage.backgroundColor='#000';
		//this.blue=rgbaToHex("(0,0,255,"+localStorage.getItem('ninja_screen_blue')+")");
		//this.red=Phaser.Color.hexToColor(rgbaToHex("rgba(255,0,0,"+(localStorage.getItem('ninja_screen_red')/100)+")")).color;
		minutos=0;
		segundos=0;
		self=this;
		
	},
	preload:function(){
		
	},
	create:function(){
		game.world.setBounds(0,0,800,5200);
		game.stage.scale.pageAlignHorizontally = true;
		game.stage.scale.pageAlignVeritcally = true;	
		game.stage.backgroundColor='#424242';
		game.physics.startSystem(Phaser.Physics.ARCADE);
		
		plataformas=game.add.group();
		plataformas.enableBody=true;
		stars=game.add.group();
		stars.enableBody=true;
		var initY = 400;
		var lastRandomX = 0;
		var randomX = 0;
		var width_tile=127;
		var salto=100;
		var desplazamiento=150;
		
		var distancia=200;

		for(i = 2; i <= 41; i++){
			if(lastRandomX == 0){
				randomX = game.world.width/2-55;
				lastRandomX = randomX;
				plataformas.create(randomX,game.world.height-(i*120),'stone2');
				nextX=randomX;
			}else{
				//Alinear a la izquierda
				if(randomIntFromInterval(1,2)==1){
					

					if(lastRandomX-(width_tile+salto)<=0){
						randomX=lastRandomX+(width_tile+salto);
						nextX=randomX-distancia;
					}else{
						randomX=lastRandomX-(width_tile+salto);
						nextX=randomX+distancia;
					}

				}else{
					randomX=(lastRandomX+(width_tile+salto)>(game.world.width-(width_tile+salto))) ? lastRandomX-(width_tile+salto) : lastRandomX+(width_tile+salto);
					nextX=randomX+150;

				}			
				y=(i*120);

				if(i<=5){
					tiempo=50;
				}else if(i>5 && i<20){
					tiempo=100;
				}else{
					tiempo=150;
				}
				var stone=new Stone(game,randomX,game.world.height-y,i);

				plataformas.add(stone);
				plataformas.children[plataformas.length-1].addTween(nextX,tiempo)
			
				var star=stars.create(randomX+(width_tile/2)-24,game.world.height-y-60,'star',4);
				star.body.gravity.y=200;
				star.body.bounce.y=Math.random()*0.2;
				
				lastRandomX = randomX;
			}	
		}
	plataformas.setAll('body.immovable',true);
	plataformas.setAll('body.allowGravity', false);
	
	pisos=game.add.group();	
	pisos.enableBody=true;
	pisos.create(0,game.world.height-128,'stone');
	pisos.create(250,game.world.height-128,'stone');
	pisos.create(500,game.world.height-128,'stone');
	pisos.create(750,game.world.height-128,'stone');
	pisos.setAll('body.immovable',true);
	pisos.setAll('body.allowGravity', false);
	
	score=0;
	scoreText=game.add.text(16,16,'score: 0',{fontSize:'32px',fill:'#'+this.blue});
	scoreText.fixedToCamera=true;
		
		stars.setAll('tint',BLUE);
		stars.setAll('alpha',(localStorage.getItem("ninja_screen_blue")/100));

		stars.setAll('body.collideWorldBounds',true);
		
		plataformas.setAll('tint',BLUE);
		plataformas.setAll('alpha',(localStorage.getItem("ninja_screen_blue")/100));

		player=game.add.sprite(plataformas.children[0].position.x+20,plataformas.children[0].position.y-100,'dude');
		player.tint=RED;
		player.alpha=localStorage.getItem("ninja_screen_red")/100;
		game.camera.follow(player);
		game.physics.arcade.enable(player);
		player.body.setSize(10,35,10,12);
		player.body.bounce.y=0.2;
		player.body.gravity.y=500;
		player.scale.setTo(2);
		player.body.collideWorldBounds=true;
		player.body.checkCollision.up = false;
	    player.body.checkCollision.left = false;
	    player.body.checkCollision.right = false;
		player.animations.add('left',[0,1,2,3],10,true);
		player.animations.add('right',[5,6,7,8],10,true);
		
		cursors=game.input.keyboard.createCursorKeys();
		
		
		
		tween_subir_volumen=game.add.tween(sonido_suspenso).to({volume:1},1000, null, false);
		tween_bajar_volumen=game.add.tween(sonido_suspenso).to({volume:0},2000, null, false);
		
		tween_subir_volumen.onComplete.add(function(){
			
		});
		tween_bajar_volumen.onComplete.add(function(){			
			sonido_suspenso.stop();
		});
		
		crear_btn_expan();
		this.direccion=0;

		timer = game.time.create(false);
	    timer.loop(1000, function(){
	    	if(segundos>59){
	    		segundos=0;
	    		minutos++;
	    	}
	    	segundos++;
	    	this.txt_reloj.text=minutos+":"+segundos;
	    }, this);
	    timer.start();
	    this.txt_reloj=game.add.text(16,80,minutos+":"+segundos);
	    this.txt_reloj.fixedToCamera=true;
	},
	update:function(){
		/*------------------------ Capturar coliciones ----------------------------*/
		game.physics.arcade.collide(stars,plataformas,function(star,platform){
			if(star.body.gravity.y!=0){
				star.body.gravity.y=0;
				star.body.y=star.body.y-10;
			}
		});	
		game.physics.arcade.overlap(player,stars,collectStar,null,this);

		game.physics.arcade.collide(player,pisos,function(){
			
		});
		this.hitPlatform=game.physics.arcade.collide(player,plataformas,function(player,piso){
			/*if(player.frame==4){
				player.x=piso.x;
			}*/
			if(piso.index==41){
				self.txt_reloj.destroy();
				player.y=plataformas.children[plataformas.length-1].y-60;
				player.x=plataformas.children[plataformas.length-1].x+40;
				player.frame=4;
				scoreText.destroy();
				game.state.start("end",false,true);
			}
			
		});

		
		//Resetear velocidad en x
		player.body.velocity.x=0;
		
		
		/*---------------------- Activar o Desactivar musica de suspenso ----------------------*/
		if(player.y<=2640 && !sonido_suspenso.isPlaying && !tween_subir_volumen.isRunning && !tween_bajar_volumen.isRunning){	
			//game.stage.backgroundColor='#2B2E30';
			console.log('subir volumen');
			sonido_suspenso.play();
			tween_subir_volumen.start();
		}else if(player.y>2640 && !tween_bajar_volumen.isRunning && !tween_subir_volumen.isRunning){
			//game.stage.backgroundColor='#5C656A';
			console.log('bajar volumen');
			tween_bajar_volumen.start();
		}
		/*--------------------------- Control ----------------------------*/
		
		if(game.input.keyboard.isDown(Phaser.KeyCode.ESC)){
			game.state.start('menu');
		}
		
		
		if(cursors.left.isDown){
			player.body.velocity.x=-250;		
			player.animations.play('left');
		}else if(cursors.right.isDown){
			player.body.velocity.x=250;
			player.animations.play('right');
		}else{
			player.animations.stop();
			player.frame=4;
			
		}
		if((game.input.keyboard.isDown(Phaser.KeyCode.SPACEBAR) || cursors.up.isDown) && player.body.touching.down && this.hitPlatform){
			player.body.velocity.y=-350;
			sonido_salto[randomIntFromInterval(0,1)].play();
		}
		/*---------------------------- seguir al jugador con la camara----------------------*/
		game.world.wrap(player,player.width/2+100,false);
	},
	render:function(){
		 //game.debug.body(player);
		  
	}
}
/*--------------------------- FIN ------------*/
var estado_end={
	

	create:function(){
		var style = { font: "bold 60px", fill: "#000", boundsAlignH: "center", boundsAlignV: "middle" };
	    text = game.add.text(0, 0, "Juego finalizado", style);
	    text.setShadow(3, 3, 'rgba(0,0,0,0.5)', 2);
	    text.setTextBounds(0, 100, 800, 60);

	    style.font="bold 40px";
	    var t2=game.add.text(0,0,"Puntaje "+score,style);
	    t2.setTextBounds(0, 170, 800, 100);

	    style.font="bold 40px";
	    var t2=game.add.text(0,0,"Tiempo de juego "+minutos+":"+segundos,style);
	    t2.setTextBounds(0,230, 800, 100);

	    game.add.button(game.world.centerX-95, 320, 'btn_jugar', function(){
	    	game.state.start('jugar',true,false);
	    }, this, 2, 1, 0);

	    crear_btn_expan();
	}
}
game.state.add('end',estado_end);
game.state.add('cargando',estado_cargando);
game.state.add('menu',estado_menu);
game.state.add('calibrar',estado_calibrar);
game.state.add('jugar',estado_jugando);

game.state.start('cargando');



