<?php
require_once 'BD.php';
$BD = new BD();
session_start();
if (isset($_SESSION['user2'])) {
    # code...
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inicio | CLIMA LABORAL ADMINISTRADOR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  href="img/logofa.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      background-color: #f1f1f1;
      height: 120%;
    }

    .slideanim {
      padding-top: 10px;
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
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="inicio.php"><h5>FUNDACIÓN AMPARO</h5></a><img src="img/amparo.png" width="45px" height="45px">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li><a href="crearEncuesta.php">Crear Preguntas</a></li>
        <li><a href="verCampos.php">Ver Campos</a></li>
        <li><a href="faltantes.php">Faltantes</a></li>
        <li><a href="preabierta.php">Preguntas Abiertas</a></li>
        <li><a href="reiniciar.php">Reiniciar  Encuesta</a></li>
        <li><a href="Bloques/index2.php">Ver Graficas</a></li>
        <li><a href="pdfAll.php">Respuestas Todas</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> SALIR</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <!--<p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>-->
      </div>
      <div class="col-sm-8 text-center"> 
        <h1>PANEL DEL ADMINISTRADOR</h1>
        <p>Da clic para ir a la página de <a href="http://192.168.1.7/clima_laboral" target="__blank">CLIMA LABORAL</a></p>
        <hr>
        <div class="row slideanim">
          <div class="col-sm-3 text-center">
            <form action="crearEncuesta.php">
              <img src="img/crear_en.png" width="150px" height="150px" />
              <br>
              <button class="btn btn-primary" style="width:auto;">Crear Encuesta</button>
            </form>
          </div>
          <div class="col-sm-3 text-center">
            <form action="verCampos.php">
              <img src="img/ver_campos.png" width="150px" height="150px" />
              <br>
              <button class="btn btn-primary" style="width:auto;">Ver Campos</button>
            </form>
          </div>
          <div class="col-sm-3 text-center">
            <form action="faltantes.php">
              <img src="img/faltantes.png" width="150px" height="150px" />
              <br>
              <button class="btn btn-primary" style="width:auto;">Faltantes</button>
            </form>
          </div>
          <div class="col-sm-3 text-center">
            <form action="preabierta.php">
              <img src="img/pre_open.png" width="150px" height="150px" />
              <br>
              <button class="btn btn-primary" style="width:auto;">Preguntas Abiertas</button>
            </form>
          </div>
        </div>

        <div class="row slideanim">
          <div class="col-sm-4 text-center">
            <form action="reiniciar.php">
              <img src="img/reiniciar.png" width="150px" height="150px" />
              <br>
              <button class="btn btn-primary" style="width:auto;">Reiniciar Encuesta</button>
            </form>
          </div>
          <div class="col-sm-4 text-center">
            <form action="Bloques/index2.php">
              <img src="img/graficas.png" width="150px" height="150px" />
              <br>
              <button class="btn btn-primary" style="width:auto;">Ver Graficas</button>
            </form>
          </div>
          <div class="col-sm-4 text-center">
            <form action="pdfAll.php">
              <img src="img/respuestas.png" width="150px" height="150px" />
              <br>
              <button class="btn btn-primary" style="width:auto;">Respuestas Todas</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-2 sidenav">

      </div>
    </div> 
  </div>


<footer class="container-fluid text-center">
  <img src="img/logo_fa.png"><br><br>
  <p>© Todos los Derechos Reservados <a href="http://www.fundacionamparo.com" target="_blank">Fundación Amparo I.A.P.</a></p>
</footer>

</body>
</html>


<?php 
}else{
    header("Location: index.html");
}
?>