<?php
require_once 'BD.php';
$BD = new BD();
session_start();
if (isset($_SESSION['user2'])) {
    # code...
?>
<!DOCTYPE html>

<html class="no-js"> 
  <head>
  <title>Faltantes | CLIMA LABORAL ADMINISTRADOR</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="icon"  href="img/logofa.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Menu Clima Laboral" />
  <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="FreeHTML5.co" />

 
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />


  <link rel="shortcut icon" href="favicon.ico">

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  

  <link rel="stylesheet" href="css/animate.css">
  
  <link rel="stylesheet" href="css/icomoon.css">

  <link rel="stylesheet" href="css/bootstrap.css">
  
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/style.css">

  
  <script src="js/modernizr-2.6.2.min.js"></script>
-->  
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
      background-color:  #20211F;
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

  <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Stellar -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Counters -->
    <script src="js/jquery.countTo.js"></script>
        <!-- MAIN JS -->
    <script src="js/main.js"></script>

  
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
        <li><a href="crearEncuesta.php">Crear Preguntas</a></li>
        <li><a href="verCampos.php">Ver Campos</a></li>
        <li><a href="faltantes.php">Faltantes</a></li>
        <li><a href="preabierta.php">Preguntas Abiertas</a></li>
        <li><a href="reiniciar.php">Reiniciar  Encuesta</a></li>
        <li><a href="Bloques/index2.php">Ver Graficas</a></li>
        <li><a href="pdfAll.php">Respuestas Todas</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> SALIR</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<!--<div id="fh5co-page">
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

      <h1 id="fh5co-logo"><a href="index.html">
      <img width="150" height="150" src="images/fa.png" alt="MENU CLIMA LABORAL"></a></h1>
        <nav id="fh5co-main-menu" role="navigation">
                <ul>
                    <li ><a href="cerrar_sesion.php">Salir</a></li>
                    <li ><a href="crearEncuesta.php">Crear Preguntas</a></li>
                    <li ><a href="verCampos.php">Ver campos</a></li>
                     <li class="fh5co-active"><a href="faltantes.php">Faltantes</a></li>
                     <li><a href="preabierta.php">preguntas abiertas</a></li>
                   <li><a href="reiniciar.php">Reiniciar  encuesta</a></li>
                     <li><a href="Bloques/index2.php">Ver Graficas</a></li>
                     <li><a href="pdfAll.php">Respuestas todas</a></li>

                </ul>
            </nav>

      <div class="fh5co-footer">
      </div>
	  
    </aside>
</div>

<head>
	<title>Faltantes</title>
</head>
-->
<body>

    <div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <!--<p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>-->
      </div>
      <div class="col-sm-8 text-center"> 
        <h1>FALTAN DE CONTESTAR LA ENCUESTA<h1>
        <?php 

                  echo '<center><table border=2px> ';
                  
            $con = 0;  
            $con2 = 0;       
            $faltan = $BD->Faltantes();
            $contestados = $BD->Contestados();

            foreach ($faltan as $row) {
                    
                            echo'<tr >';
                            /*echo '<td width = "35%" >'

                            .'<br>'.'<br>'.'</td>';*/
                            
                            echo '<td width="10%" ALIGN="center">'.
                            '<h4>'.$row['id_empleado'].'</td><td width="40%" ALIGN="center"><h4>'.$row['nombre'].'<h4>'.'</td>';
                            if ($row['encuesta_terminada'] == 0) {
                              # code...
                              $con2++;
                              echo '<td width="9%" ALIGN="center">'.
                            '<h4>'.'<img src="rechazo.png" alt=15px height=15px>'.'<h4>'.'</td>'.'&nbsp;&nbsp;&nbsp;';
                            }
                            else{
                                $con++;
                              echo '<td width="9%" ALIGN="center">'.
                            '<h4>'.'<img src="advertencia.jpg" alt=18px height=18px>'.'<h4>'.'</td>'.'&nbsp;&nbsp;&nbsp;';
                            }
                            echo "</tr>";
                            

               }
               echo "</table></center>";
               echo "Contestando: ".$con."<br>";
               echo "Faltantes: ".$con2."<br>";
               echo "Finalizados: ".$contestados;

          
        ?>
    

            
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