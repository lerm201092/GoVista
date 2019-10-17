var Stone=function(game,x,y,index){
	this.index=index;
	Phaser.Sprite.call(this,game,x,y,"stone2");	
	this.originalX=x;
	this.velocidad=50;	
	this.y=y;
	this.x=x;
	if(randomIntFromInterval(1,10)<3){
		//this.tint=eval('0x'+localStorage.getItem('blue'));
		//this.tint=BLUE;
		//this.alpha=((localStorage.getItem("ninja_screen_blue")/100))
	}
}
Stone.prototype=Object.create(Phaser.Sprite.prototype);

Stone.prototype.update=function(){	
	//console.log(this.x)
	if(this.body.velocity.x>0){
		if(this.position.x>this.destino){
			this.velocidad*=-1;
		}
	}else if(this.body.velocity.x<0){
		if(this.x<this.originalX){
			this.velocidad*=-1;
		}
	}
	this.body.velocity.x=this.velocidad;
	
}
Stone.prototype.addTween=function(destino,velocidad){
	console.log(velocidad)
	if(destino!=this.originalX){
		this.destino=destino;
		if(this.destino>this.x){
			this.velocidad=velocidad;
		}else{
			this.velocidad=-velocidad;
		}
		//game.add.tween(this.body.velocity).to({'x':[this.originalX,destino,this.originalX]},tiempo,Phaser.Easing.Linear.None, true,1, Number.MAX_VALUE);
	}
}