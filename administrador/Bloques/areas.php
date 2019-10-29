<?php
include 'BD.php';  //para incluir la clase que maneja la BD
$BD = new BD();
//$id = 15;
session_start();
if (isset($_SESSION['user2'])) {
  # code...
?>

<!DOCTYPE html>
 <html class="no-js" lang="es"> 
  <head>
  <title>Graficas | Clima Laboral</title>
  <meta charset="utf-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
  <link rel="icon"  href="logofa.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
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
      height: 200%;
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
      <a class="navbar-brand" href="inicio.php"><h5>FUNDACIÓN AMPARO</h5></a><img src="../img/amparo.png" width="45px" height="45px">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">..
         <li><a href="../crearEncuesta.php">Crear Preguntas</a></li>
        <li><a href="../verCampos.php">Ver Campos</a></li>
        <li><a href="../faltantes.php">Faltantes</a></li>
        <li><a href="../preabierta.php">Preguntas Abiertas</a></li>
        <li><a href="../reiniciar.php">Reiniciar  Encuesta</a></li>
        <li><a href="../Bloques/index2.php">Ver Graficas</a></li>
        <li><a href="../pdfAll.php">Respuestas Todas</a></li>
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
         </div>
         <div class="col-sm-8">
         <br><br>
          <h1>Graficas</h1><br><br>
		    <br>
        <?php 

                  echo '<center>
                  
                  <table border=0>';
                          
                                            
           $area = $BD->MostrarAreasAll();

            foreach ($area as $row) {
                    
                echo'<tr>';

                echo '<td width="5%" ALIGN="center"><h4>'.$row['id_depto'].'</h4></td>';
                           
                            
                            //botones de editar y eliminar
                            echo '<td width = "10%" >
                            <h4>
							<a href="index3.php?claves='. $row['id_depto'] .'">'.
                            $row['nombre']
                            .'
                            
                            </a>
                            </h4>

                            </td>';

                             echo'</tr>';
                            



                          }
                          echo '</table>'
                ?>
         </div>
         <div class="col-sm-2 sidenav">
         </div>
    </div> 
  </div>

<footer class="container-fluid text-center">
  <img src="../img/logo_fa.png"><br><br>
  <p>© Todos los Derechos Reservados <a href="http://www.fundacionamparo.com" target="_blank">Fundación Amparo I.A.P.</a></p>
</footer>



</body>
</html>
<?php 
}else{
header("Location: index.html");

}
?>
