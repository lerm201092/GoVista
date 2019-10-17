var COLOR_TEXT='#fff'
			var BG='#000'
			var VERDE=0x145A32;
			var ROJO=0xFF0000;
			var OPACIDAD=0.7;
			var COLUMNAS=2;
			var OFFSET_X=160;
			var NUM_FIGURAS=0;
			var figures=['square','triangle','circle','diamon','square2','triangle2','circle2','diamon2'];
			
			var Config={
				pantalla:'',
				dificultad:'',
				ojo_afectado:'',
				numero_sesion:'',
				tiempo:0
			}

			Config.pantalla=($_GET('pantalla')) ? $_GET('pantalla') : '';
			Config.dificultad=($_GET('dificultad')) ? $_GET('dificultad') : 'baja';
			Config.tiempo=($_GET('tiempo')) ? $_GET('tiempo') :10;

			switch(Config.dificultad){
				case 'baja':
					OFFSET_X=280;
					COLUMNAS=2;
					NUM_FIGURAS=4;
					figures=['square','triangle','circle','diamon'];
				break;
				case 'media':
					OFFSET_X=220;
					COLUMNAS=3;
					NUM_FIGURAS=6;
					figures=['square','triangle','circle','diamon','square2','triangle2'];
				break;
				case 'alta':
					OFFSET_X=160;
					COLUMNAS=4;
					NUM_FIGURAS=8;
					figures=['square','triangle','circle','diamon','square2','triangle2','circle2','diamon2'];
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
				game.add.button(game.world.width-70,game.world.height-70,'expand',function(){
					gofull()
				})
				/*
				game.add.button(game.world.width-70,game.world.height-140,'home',function(){
					game.state.start("menu",true,false)
				})*/
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
					
				}

				graphics = game.add.graphics(0, 0);
				graphics.beginFill(configuracion.izquierda.color,configuracion.izquierda.opacidad);
				graphics.drawRect(0,0, game.world.width/2,game.world.height);

				
				graphics.beginFill(configuracion.derecha.color,configuracion.derecha.opacidad);
				graphics.drawRect(game.world.width/2,0, game.world.width/2,game.world.height);
			}
			var game = new Phaser.Game(800,600, Phaser.AUTO,'screen');
var VERDE=0x00ff00;
var errores=0,minutos=0,segundos=0;
var opacity_screen_red=(localStorage.getItem("memory_screen_red")) ? localStorage.getItem("memory_screen_red") : 0;
var opacity_screen_blue=(localStorage.getItem("memory_screen_blue")) ? localStorage.getItem("memory_screen_blue") : 0;
var color_screen=parseInt((localStorage.getItem('memory_color_screen')) ? localStorage.getItem('memory_color_screen') : 6);
var memory=[];


/*----------------------------- Estado generar memoria ------------------------------*/	
var state_memory={

	init:function(){
		game.stage.backgroundColor=BG;
		game.world.setBounds(0,0,800,600);	
		memory=figures.sort(function() {return Math.random() - 0.5});
		p_opacity_screen_blue=(opacity_screen_blue/100);
		p_opacity_screen_red=(opacity_screen_red/100);
		color_screen=parseInt(localStorage.getItem("memory_color_screen"))
		game.scale.fullScreenScaleMode = Phaser.ScaleManager.EXACT_FIT;
	},
	preload:function(){
		
		game.load.image('expand','assets/gui/expand.png')
		game.load.image('home','assets/gui/home.png')
		
		game.load.audio('win','assets/sounds/Jingle_Win_00.wav');
		game.load.audio('lose','assets/sounds/Jingle_Lose_00.wav');
		game.load.audio('point','assets/sounds/Collect_Point_01.wav');
		
		
		game.load.image('btn_ready','assets/gui/btn_ready.png');
		
		game.load.image('square','assets/square.png');
		game.load.image('square2','assets/square.png');
		
		game.load.image('triangle','assets/triangle.png');
		game.load.image('triangle2','assets/triangle.png');
		
		game.load.image('circle','assets/circle.png');
		game.load.image('circle2','assets/circle.png');
		
		game.load.image('diamon','assets/diamon.png');
		game.load.image('diamon2','assets/diamon.png');
		
		game.load.image('holder','assets/holder.png');
	},
	create:function(){	

		
		/*------------------ Holders -------------------*/
		this.holder=game.add.group();
		this.holder.enableBody=true;
		width=120;
		height=120;
		offsetY=50;

		var i=0;
		for(var y=0;y<2;y++){
			for(var x=0;x<COLUMNAS;x++){
				var f=this.holder.create((OFFSET_X+x*width),(offsetY+height*y),'holder');
					f.pos=i;
				i++;
			}
		}
		this.holder.setAll('tint',0x000000);
		/*------------------ Figures -------------------*/
		i=0;
		for(var y=0;y<2;y++){			
			for(var x=0;x<COLUMNAS;x++){				
				var pX=(OFFSET_X+x*width);
				var pY=(offsetY+height*y);
				var figure=memory[i];
				var color=(figure.includes('2')) ? 0X0000FE : 0xFF0000;
				var f=game.add.sprite(pX,pY,figure);
					f.tint=color;	
					i++;
			}
		}

		filtro_pantalla();
		crear_btn_expan()

		/*------------------- Gui ---------------------*/
		this.texto=game.add.text(0,0,'Memorice el orden de las figuras.',{
			fontSize:'24px',
			fill:COLOR_TEXT,
			boundsAlignH: "center", 
			boundsAlignV: "center"
		});
		
		this.texto.setTextBounds(0,10, 800, 100);
		var btn=game.add.button(game.world.centerX-125,300, 'btn_ready',function(){
			game.state.start('jugar',true,false);
		}, this, 0,0, 0);
		
	},
	render :function() {
		//render(this);
	},
	update:function(){
		if(game.input.keyboard.isDown(Phaser.KeyCode.ESC)){
			game.state.start('menu');
		}
	}
}


var state_play={
	init:function(){
		
		errores=0;
		game.stage.backgroundColor=BG;
		game.world.setBounds(0,0,800,600);	
		figuras_faltantes=NUM_FIGURAS;
	},
	preload:function(){
		
	},
	create:function(){
		game.physics.startSystem(Phaser.Physics.ARCADE);
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

	    
		this.sound_win=game.add.audio('win')
		this.sound_lose=game.add.audio('lose')
		this.sound_point=game.add.audio('point')
		
		//this.sl = new Phaser.Rectangle(0, 0, 400,600);
		//this.sr = new Phaser.Rectangle(400, 0, 400,600);
		 
		this.holder=game.add.group();
		this.holder.enableBody=true;
		width=120;
		height=120;
		offsetY=50;
		var i=0;
		for(var y=0;y<2;y++){
			for(var x=0;x<COLUMNAS;x++){
				var f=this.holder.create((OFFSET_X+x*width),(offsetY+height*y),'holder');
				f.pos=memory[i];
				i++;
			}
		}
		this.holder.setAll('tint',VERDE);
		/*------------------ Figures -------------------*/
		
		memory.sort(function() {return Math.random() - 0.5});
		
		offsetY=340;
		this.figures=game.add.group();
		this.figures.enableBody=true;
		i=0;
		for(var y=0;y<2;y++){			
			for(var x=0;x<COLUMNAS;x++){				
				var pX=(OFFSET_X+x*width);
				var pY=(offsetY+height*y);
				var figure=memory[i];
				var color=(memory.includes('2')) ? 0X0000FE : 0xFF0000;
				var f=this.figures.create(pX,pY,figure);
					f.pos=memory[i];
					f.originalX=pX;
					f.originalY=pY;
					f.tint=color;					
					f.inputEnabled=true;
					f.input.enableDrag();
					f.blendMode =6;
					f.events.onDragStop.add(this.dragStop, this);
					i++;
			}
		}

		

		filtro_pantalla();
		
		/*------------------------------------------------------- Timer---------------------------------*/
		this.timer = game.time.create(true);
		this.timer.loop(1000,this.reloj,this);
		this.timer.start();
		
		this.txt_reloj=game.add.text(10,40,minutos+":"+segundos,{
				fontSize:'24px',
				fill:COLOR_TEXT,
				boundsAlignV: "center"
			})

		this.txt_errores=game.add.text(0,0,'Movimientos errados '+errores,
			{
				fontSize:'24px',
				fill:COLOR_TEXT,
				boundsAlignV: "center"
			});
		this.txt_errores.setTextBounds(10,10, 800, 100);

		crear_btn_expan()
		 
	},
	dragStop:function(c){
		if(!game.physics.arcade.overlap(c,this.holder,function(h){
			if(figuras_faltantes==0){
				this.sound_win.play()
				game.state.start('end',true,false);
			}
		},function(f,h) {	
			if(c.pos==h.pos){
				if(game.math.distance(c.x,c.y,h.x,h.y)<40){
					f.input.draggable=false;
					game.add.tween(f).to({x:h.x,y:h.y},500,Phaser.Easing.Linear.None, true,0,0);
					figuras_faltantes--;	
					this.sound_point.play()
					return true;
				}
			}
			
			return false;
		},this)){
			errores++;
			window.navigator.vibrate(200);
			game.add.tween(c).to({x:c.originalX,y:c.originalY},500,Phaser.Easing.Linear.None, true,0,0);

		}
	},
	reloj:function(){
		segundos++;
		if(segundos>59){
			minutos++;
			segundos=0;
		}
		this.txt_reloj.text=minutos+":"+segundos;
	},
	render :function() {
		//render(this);
	},
	update:function(){
		this.txt_errores.text='Movimientos errados '+errores;
		if(game.input.keyboard.isDown(Phaser.KeyCode.ESC)){
			this.sound_lose.play()
			game.state.start('memory');
		}
		if(minutos>=Config.tiempo){
			game.state.start('fin')
		}
	}
}


var estado_end={
	create:function(){
		var style = { font: "bold 60px", fill:COLOR_TEXT, boundsAlignH: "center", boundsAlignV: "middle" };
	    text = game.add.text(0, 0, "Juego finalizado", style);
	    text.setShadow(3, 3, 'rgba(0,0,0,0.5)', 2);
	    text.setTextBounds(0, 100, 800, 60);

	    style.font="bold 40px";
	    var t2=game.add.text(0,0,"Errores cometidos "+errores,style);
	    t2.setTextBounds(0, 170, 800, 100);

	    style.font="bold 40px";
	    var t2=game.add.text(0,0,"Tiempo de juego "+minutos+":"+segundos,style);
	    t2.setTextBounds(0,230, 800, 100);
		
		setTimeout(function(){
			game.state.start('memory');
		},2500)
	    crear_btn_expan();
	}
}

var estado_fin={
	create:function(){
		var style = { font: "bold 60px", fill:COLOR_TEXT, boundsAlignH: "center", boundsAlignV: "middle" };
	    text = game.add.text(0, 0, "Ya has terminado la sesion vuelve pronto.", style);
	    text.setTextBounds(0, 100, 800, 60);
	    crear_btn_expan();
	}
}

game.state.add('end',estado_end);
game.state.add('fin',estado_fin);
//game.state.add('menu',estado_menu);
//game.state.add('calibrar',estado_calibrar);
game.state.add('jugar',state_play);
game.state.add('memory',state_memory);
game.state.start('memory');