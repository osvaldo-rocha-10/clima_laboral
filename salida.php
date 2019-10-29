<!DOCTYPE html>
<html lang="en">
<head>
  <title>Terminada | CLIMA LABORAL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  href="img/logofa.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="img/amparo.png" width="45px" height="45px"><a class="navbar-brand" href="#">FUNDACIÓN AMPARO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>-->
      </ul>
    </div>
  </div>
</nav>

<body>

<br><br><br><br><br><br><br><br>

<div class="container text-center">
  <h2>¡ATENCIÓN!</h2>
  
  <div class="alert alert-danger text-center">
    <strong>¡ATENCIÓN!</strong> La encuesta ya ha sido contestada, ya no puedes ingresar de nuevo para contestarla, haz clic en finalizar para salir. <a href="cerrar_sesion.php">Finalizar</a>
  </div>
  
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<footer class="container-fluid text-center">
  <img src="img/logo_fa.png"><br><br>
  <p>© Todos los Derechos Reservados <a href="http://www.fundacionamparo.com" target="_blank">Fundación Amparo I.A.P.</a></p>
</footer>

</body>
</html>
