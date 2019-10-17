<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | Crosssing ways</title>
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <script src="TemplateData/UnityProgress.js"></script>  
    <script src="Build/UnityLoader.js"></script>
    <script src="jquery-3.1.0.min.js" type="text/javascript"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "Build/GoVistaWeb.json", {onProgress: UnityProgress});
        
         //TIEMPO
        function Duration(tiempo)
        {   
            gameInstance.SendMessage('estado','Duration',tiempo);
        }
        //ID
        function ID(id)
        {
            gameInstance.SendMessage('estado','ID_',id);
        }
        //ID_HISTORY
        function ID_His(id_h)
        {
            gameInstance.SendMessage('estado','ID_H',id_h);
        }
        //DIFICULTAD
        function Difi(d)
        {
            gameInstance.SendMessage('estado','difi',d);
        }
        //OJO IZQUIERDO
        function EyeL(left)
        {
            gameInstance.SendMessage('estado','eyeL',left);
        }
        //OJO DERECHO
        function EyeR(right)
        {
            gameInstance.SendMessage('estado','eyeR',right);
        }
        //STATUS
        function Status(st)
        {
            gameInstance.SendMessage('estado','Stat',st);
        } 
        //URL Respuesta
        function url(link)
        {
            gameInstance.SendMessage('estado','LinkRespuesta',link);
        } 
        
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">Crosssing ways</div>
      </div>
	 <div id="get-container">otro</div>
    </div>
      
      <script>
          function respuesta(id,duration,status)
          {
              $.get("{!!URL::to('/saveExerciceId')!!}", {
                  id: id,
                  duration: duration,
                  status: status
              }, function (data) {
                  $("#get-container").html(data[0].observation);
              });
              alert("ID: " + id + " DURATION: " + duration + " STATUS: " + status);
          }
      </script>
      
      <script>
		function getQueryVariable(variable) {
		   var query = window.location.search.substring(1);
		   var vars = query.split("&");
		   for (var i=0;i<vars.length;i++) {
				   var pair = vars[i].split("=");
				   if(pair[0] == variable){return pair[1];}
		   }
		   return(false);
		}	
		
		setTimeout(Iniciar, 15000);
		function Iniciar()
		{
			ID(getQueryVariable('id'));
			Duration(getQueryVariable('duracion'));
			ID_His(getQueryVariable('id_his'));
			Difi(getQueryVariable('difi'));
			EyeL(getQueryVariable('eyel'));
			EyeR(getQueryVariable('eyer'));
			Status(getQueryVariable('status'));	
			url("http://www.govista.com/saveExerciceId");
		}

      </script>
	  
	  
      
  </body>
</html>