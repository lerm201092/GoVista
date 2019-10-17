var game = new Phaser.Game(360,640, Phaser.CANVAS, '',null,false,false);


Patrullero=function(juego,x,y){
	this.line=new Phaser.Line();
	
	Phaser.Sprite.call(this,game,x,y,"juan");	
    game.physics.arcade.enable(this);
    //this.collideWorldBounds = true;
    //this.enableBody = true;
    //this.body.collideWorldBounds = true;
	this.player=juego.player;
	this.muros=juego.muros;
	
	this.velocidad=80;
	this.animations.add('right',[12,13,14,15,16,17],15,true);
	this.animations.add('left',[6,7,8,9,10,11],15,true);
	this.animations.add('down',[0,1,2,3,4,5],15,true);
	this.animations.add('up',[18,19,20,21,22,23],15,true);
	this.estado='patrullaje';
	this.body.setSize(11,19,8,8);
    this.body.velocity.x = this.velocidad;
	this.cambiarDireccion=function(){
		this.velocidad=this.velocidad*-1;
		this.body.velocity.x = this.velocidad;
	}
	console.log(juego.muros)
}
Patrullero.prototype = Object.create(Phaser.Sprite.prototype);
Patrullero.prototype.constructor = Patrullero;
Patrullero.prototype.render=function(){
	game.debug.geom(this.line);
}
Patrullero.prototype.update=function(){
	
	this.muros.debug=false;
	//this.muros.tint='';
	
	var destino=(this.body.velocity.x>0) ? 10000 : -10000;
	this.line = new Phaser.Line(this.x,this.y,destino,this.y);
	var line= new Phaser.Line(this.x,this.y,destino,this.y);
	
	var line_player=new Phaser.Line(this.player.x,this.player.y,this.player.x,this.player.y+32);
	
	var tile_tocado=this.muros.getRayCastTiles(this.line,4, false, false);
	if(tile_tocado.length>0){
		var primero=tile_tocado[tile_tocado.length-1];
		//this.line.end.x=primero.worldX;
		this.muros.dirty=true
	}
	if(line.intersects(line_player)){
		if(tile_tocado.length>0){
			if(primero.worldX>this.player.x){
				this.player.tint=0xffffff
			}else{
				this.player.tint=0x00000
			}
		}else{
			this.player.tint=0xffffff
		}
	}else{
		this.player.tint=0xffffff
	}
	
	
	switch(this.estado){
		case 'patrullaje':
			if (this.body.velocity.x > 0) {
				this.play('right');
			} else {
				this.play('left');
			}
		break
		default:
			this.body.velocity.x=0;
		break;
	}
}

state_play={
	preload:function(){
		
		game.load.image('expandir', 'imagenes/gui/expandir.png');
		game.load.image('home', 'imagenes/gui/home.png');
		
		game.load.tilemap('level1', 'niveles/nivel1.json', null, Phaser.Tilemap.TILED_JSON);
		game.load.tilemap('level2', 'niveles/nivel2.json', null, Phaser.Tilemap.TILED_JSON);
		
		game.load.image('gameTiles', 'imagenes/tileset2.png');
		
		game.load.image('llave', 'imagenes/llave.png');
		game.load.image('puerta', 'imagenes/puerta.png');
		
		game.load.spritesheet('juan', 'imagenes/juan.png',32,32,24);
		game.load.spritesheet('gema', 'imagenes/gema.png',32,32,8);
		game.load.spritesheet('fuego', 'imagenes/fuego.png',58,72,6);
		//game.load.spritesheet('pad', 'imagenes/gui/pad.png',101,101,4);
		
		game.load.audio('punto','sonidos/Collect_Point_00.wav')
		game.load.audio('punto1','sonidos/Collect_Point_01.wav')
		game.load.audio('win','sonidos/Jingle_Win_00.wav')
		game.load.audio('lose','sonidos/Jingle_Lose_00.wav')
	},
	create:function(){
		self=this;
		
		this.intro=true;
		
		game.world.setBounds(0,0,640,640);	
		game.stage.backgroundColor = '#fff';
		game.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
		//game.scale.fullScreenScaleMode = Phaser.ScaleManager.SHOW_ALL;
		game.scale.pageAlignHorizontally = true;
		game.scale.pageAlignVertically = true;
		game.physics.startSystem(Phaser.Physics.ARCADE);
		
		this.sonido_punto=game.add.audio('punto');
		this.sonido_punto1=game.add.audio('punto1');
		this.sonido_win=game.add.audio('win');
		this.sonido_lose=game.add.audio('lose');
		
		if(LEVEL==1){
			this.map=game.add.tilemap('level1')
		}else{
			this.map=game.add.tilemap('level2')
		}
		this.map.addTilesetImage('tileset','gameTiles')
		

		this.suelo=this.map.createLayer("suelo")
		this.suelo.resizeWorld();
		this.suelo.tint=.4*0xffffff;
		
		this.muros=this.map.createLayer("muros")
		this.muros.resizeWorld();

		this.map.setCollision(2,true,this.muros)
		
		/*------------------------------------- Objetos del mapa -----------------------------*/
		this.objetos=game.add.physicsGroup()
		
		this.map.createFromObjects('objetos','llave','llave',0, true, false, this.objetos);
		this.map.createFromObjects('objetos','salida','',0, true, false, this.objetos);
		this.map.createFromObjects('objetos','puerta','puerta',1, true, false, this.objetos);
		
		this.map.createFromObjects('gemas','gema','gema',0, true, false, this.objetos);
		this.map.createFromObjects('incendios','fuego','fuego',0, true, false, this.objetos);
		
		this.objetos.forEach(function(objeto){
			objeto.body.immovable = true;
			switch(objeto.name){
				case 'gema':
					objeto.animations.add('stand',[0,1,2,3,4,5,6,7],10,true);
					objeto.play('stand');
				break;
				case 'fuego':
					objeto.animations.add('stand',[0,1,2,3,4,5],10,true);
					objeto.play('stand');
				break
			}
		}); 
		
		/*------------------------------------------------------ Player -------------------------------*/
		this.player=game.add.sprite(32,64,'juan');
		this.player.animations.add('right',[12,13,14,15,16,17],15,true);
		this.player.animations.add('left',[6,7,8,9,10,11],15,true);
		this.player.animations.add('down',[0,1,2,3,4,5],15,true);
		this.player.animations.add('up',[18,19,20,21,22,23],15,true);
		this.player.frame=1;
		
		this.player.llave=false;
		game.physics.arcade.enable(this.player);
		this.player.enableBody=true;
		this.player.body.bounce=2;
		this.player.body.setSize(4,16,16,16);
		
		game.camera.follow(this.player);
		
		//this.enemigos=game.add.group()
		/*this.map.objects.enemigos.forEach(function(e){
			self.enemigos.add(new Patrullero(self,e.x,e.y))
		});*/
		/*---------------------------------------------- Muros falsos --------------------------------------*/
		this.muros_falsos=this.map.createLayer("muros_falsos")
		this.muros_falsos.resizeWorld();
		
		/*------------------------------------------------------- Timer---------------------------------*/
		this.timer = game.time.create(true);
		this.timer.loop(1000,this.reloj,this);
		this.timer.start();
		
		/*------------------------------------------------------ Filtros -------------------------------*/
		filtro_pantalla()
		
		/*--------------------------------------------------- Textos ------------------------------------*/
		var style = { font: "20px Arial", fill: "#ffffff"};
		this.text_score = game.add.text(5,3, "Puntuje: 0", style);
		this.text_score.fixedToCamera=true
		this.text_time = game.add.text(game.width-100,3, minutos+":"+segundos, style);
		this.text_time.fixedToCamera=true
		/*----------------------------------------------------- Botones GUI -----------------------------*/
		crear_btn_expan()
		/*
		this.pad=game.add.group();
		this.pad.add(game.add.button(0,-100, 'pad', null, this, 0, 0, 0));//top
		this.pad.add(game.add.button(0,100, 'pad', null, this, 3,3,3));//Botton
		this.pad.add(game.add.button(-100,0, 'pad', null, this, 1, 1, 1));//left
		this.pad.add(game.add.button(100,0, 'pad', null, this, 2, 2, 2));//right
		
		this.pad.setAll('fixedToCamera',true)
		this.pad.x=game.width/2-50;
		this.pad.y=game.height-200
		
		this.pad.children[0].events.onInputDown.add(function(){
			this.player.mover_arriva=true;
		},this)
		this.pad.children[0].events.onInputUp.add(function(){
			this.player.mover_arriva=false;
		},this)
		this.pad.children[1].events.onInputDown.add(function(){
			this.player.mover_abajo=true;
		},this)
		this.pad.children[1].events.onInputUp.add(function(){
			this.player.mover_abajo=false;
		},this)
		this.pad.children[2].events.onInputDown.add(function(){
			this.player.mover_izquierda=true;
		},this)
		this.pad.children[2].events.onInputUp.add(function(){
			this.player.mover_izquierda=false;
		},this)
		this.pad.children[3].events.onInputDown.add(function(){
			this.player.mover_derecha=true;
		},this)
		this.pad.children[3].events.onInputUp.add(function(){
			this.player.mover_derecha=false;
		},this)*/
	},
	right:function(){
		console.log('hol')
		this.player.body.velocity.x=100;
		this.player.play('right');
	},
	lose:function(){
		score=0
		this.sonido_lose.play()
		game.state.start(game.state.current);
	},
	reloj:function(){
		segundos++;
		if(segundos>59){
			minutos++;
			segundos=0;
		}
		this.text_time.text=minutos+":"+segundos;
	},
	update:function(){
		
		if(minutos>=Config.tiempo){
			game.state.start('fin')
		}
		
		game.physics.arcade.collide(this.player,this.muros,function(p){
			
		});
		/*
		game.physics.arcade.collide(this.enemigos,this.muros,function(enemigo,muro){
			enemigo.cambiarDireccion();     
		});*/
		
		
		game.physics.arcade.collide(this.player,this.objetos,function(player,objeto){
			switch(objeto.name){
				case 'llave':
					objeto.kill();
					player.llave=true;
					self.sonido_punto.play()
				break;
				case 'puerta':
					if(player.llave){
						objeto.kill();
					}
				break;
				case 'salida':
				self.sonido_win.play();
					game.state.start(game.state.current);
					LEVEL=(LEVEL==0) ? 1 : 0;
				break;
				case 'gema':
					objeto.kill();
					score+=10;
					self.sonido_punto1.play()
					self.text_score.text="Puntaje: "+score
				break;
				case 'fuego':
					score=0;
					self.lose()
				break;
			}
			
		}, null, this);
		
		this.player.body.velocity.x=0;
		this.player.body.velocity.y=0;
		
		if(!this.intro){
			
			if (game.input.keyboard.isDown(Phaser.Keyboard.LEFT)){
				this.player.body.velocity.x=-100;
				this.player.play('left');
			}else if (game.input.keyboard.isDown(Phaser.Keyboard.RIGHT)){
				this.player.body.velocity.x=100;
				this.player.play('right');
			}else if (game.input.keyboard.isDown(Phaser.Keyboard.UP)){
				this.player.body.velocity.y=-100;
				this.player.play('up');
			}else if (game.input.keyboard.isDown(Phaser.Keyboard.DOWN)){
				this.player.body.velocity.y=100;
				this.player.play('down');
			}else{
				this.player.frame=1;
			}
			/*
			if(this.player.mover_derecha){
				this.player.body.velocity.x=100;
				this.player.play('right');
			}else if(this.player.mover_izquierda){
				this.player.body.velocity.x=-100;
				this.player.play('left');
			}else if(this.player.mover_arriva){
				this.player.body.velocity.y=-100;
				this.player.play('up');
			}else if(this.player.mover_abajo){
				this.player.body.velocity.y=100;
				this.player.play('down');
			}else{
				this.player.frame=1;
			}*/
		}else{
			this.player.play('up');
			if(this.player.y>32){
				this.player.body.velocity.y=-10;
			}else{
				this.intro=false;
			}
		}
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
game.state.add('fin',estado_fin);
game.state.add('play',state_play);
game.state.start('play')