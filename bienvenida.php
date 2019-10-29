<?php
session_start();
if (isset($_SESSION['work'])) {

    //$id=$_GET['id']; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inicio | CLIMA LABORAL</title>
  <meta charset="utf-8">
  <link rel="icon"  href="img/logofa.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="assets/js/customs.js"></script>
</head>

<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: black;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: white;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #20211F;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    .jumbotron {
      
      background-color: black;
      color: #fff;
      padding: 25px 15px;
      height: 150px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      font-family: Montserrat, sans-serif;
  }

</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">FUNDACIÓN AMPARO I.A.P.</a><img src="img/amparo.png" width="45px" height="45px">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1 style="font-size: 40px">BIENVENIDO A LA ENCUESTA DE CLIMA LABORAL</h1>      
  </div>
</div>

 <body onload="nobackbutton();">

  <div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <!--<p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>-->
      </div>
      <div class="col-sm-8 text-left"> 
        
        <p style ="font-size: 20px" ALIGN="justify">La presente encuesta tiene como objetivo conocer tu sentir, percepción y tu experiencia dentro de Fundación Amparo IAP y detectar áreas de oportunidad dentro de la institución para su mejora.</p>
		    <p style ="font-size: 20px" ALIGN="justify">Por favor responde a cada reactivo de manera honesta.</p>
        <p style ="font-size: 20px" ALIGN="justify">SUS RESPUESTAS SON 100% CONFIDENCIALES.</p>
        <p style ="font-size: 20px" ALIGN="justify">Gracias por tu apoyo y participación.</p>
        <h2 style ="font-size: 25px" ALIGN="justify"><b>Instrucciones:</b></h2>
        <p style ="font-size: 20px" ALIGN="justify">Lee cuidadosamente las siguientes afirmaciones.
        Para cada oración selecciona la respuesta que consideres más se acerque a tu realidad.
        En las preguntas abiertas puedes expresar tu opinión con plena libertad sabiendo que cuidamos la confidencialidad de tus respuestas.
		En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>
		
        <hr>
        <h3 style ="font-size: 22px">Ejemplo</h3>
        
          <form action="iniciarEncuesta.php">
            <div class="container" required />
              <p style ="font-size: 18px">1. Me siento comodo con mi lugar de trabajo</p>
              <div class="radio">
                <label style ="font-size: 15px"><input type="radio" id="siempre" name="optradio" value="1">Siempre</label>
              </div>
              <div class="radio">
                <label style ="font-size: 15px"><input type="radio" id="casi_siempre" name="optradio" value="2">Casi Siempre</label>
              </div>
              <div class="radio">
                <label style ="font-size: 15px"><input type="radio" id="algunas_veces" name="optradio" value="3">Algunas Veces</label>
              </div>
              <div class="radio">
                <label style ="font-size: 15px"><input type="radio" id="casi_nunca" name="optradio" value="4">Casi Nunca</label>
              </div>
              <div class="radio">
                <label style ="font-size: 15px"><input type="radio" id="nunca" name="optradio" value="5">Nunca</label>
              </div>
            </div>
            <div class="container">
              <p style ="font-size: 18px">2. Que mejorarías de tu ambiente laboral</p>
              <input type="text" placeholder="Ingresa respuesta" name="res" style="width:450px" required><br><br>
            </div> 
            <div>
              <!-- Trigger/Open The Modal -->
              <button class="btn btn-success" type="submit">Continuar</button>
            </div>  
            
          </form>
              
            
      </div>
      <div class="col-sm-2 sidenav">

      </div>
    </div> 
  </div>

<br><br>

<footer class="container-fluid text-center">
  <img src="img/logo_fa.png"><br><br>
  <p>© Todos los Derechos Reservados <a href="http://www.fundacionamparo.com" target="_blank">Fundación Amparo I.A.P.</a></p>
</footer>
</body>
</html>
<?php
}else{

  header("Location: index.html");
}?>