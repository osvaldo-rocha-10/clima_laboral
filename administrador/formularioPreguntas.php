<?php
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
include 'BD.php';  //para incluir la clase que maneja la BD
$BD = new BD();
//$id = 15;
$titulo = $_GET['nombre2'];
session_start();
if (isset($_SESSION['user2'])) {
  # code...

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <link rel="icon"  href="img/logofa.png">
	<!--<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!--<link rel="stylesheet" href="css/estilos.css">-->
	<title>Formulario Preguntas | CLIMA LABORAL</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
	/*button {
    background-color: #585858;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;}*/

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
      padding-top: 100px;
      background-color: white;
      height: 100%;
    }
    .panel-danger{
      border-radius:3px;
      position:center;
      padding-right: 35px;
      padding-left: 0;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 90%;
      /*position:center;*/
      padding-top: 20%;
    }

    td, th {
      border: 1px solid #dddddd;
      /*text-align: center;*/
      /*padding: auto;*/
    }

    tr:nth-child(even) {
      background-color: #dddddd;
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

  <div class="container-fluid text-center">    
      <div class="row content">
        <div class="col-sm-2 sidenav">
          <a href="verCampos.php"><input type="button" name="regresar" class="btn btn-primary pull-center" style="width:150px;height:50px" value="Regresar"></a>
        </div>
        <div class="col-sm-8 text-center">
          <center>
            <h1><?php echo $titulo;?></h1>
            <hr>
          </center> 
          
          <form action="insert_respuesta.php" class="formulario" method="POST">
          <?php 

            echo "<center>
                    <table border=0 > ";          
            echo "    <tr> 
                        <td align='center'><h4>Pregunta</h4></td>  
                        <td></td>
                        <td></td> 
                      </tr>";
                              
            $id = $_GET['clave'];                       
            $Campos = $BD->MostrarPreguntas($id);
            foreach ($Campos as $row) {
              echo     '<tr>';
              echo       '<td width="100%" align="left"><h4>'.$row['pregunta'].'</h4></td>';
              //botones de editar y eliminar
              echo       '<td width="100%" align="center"><a href="EditarPregunta.php?claves='. $row['id'] .'&clave2='.$id.'&nombre2='.$titulo.'">&nbsp;&nbsp;&nbsp;Editar&nbsp;&nbsp;&nbsp;</a></td>';
              echo       '<td width="100%" align="center"><a href="javascript:confirmacion_borrar(\'delete_preguntas.php?clave='. $row['id'] .'&clave2='.$id.'&nombre2='.$titulo.'\', \''. $row['pregunta'] .'\');">&nbsp;&nbsp;&nbsp;Eliminar&nbsp;&nbsp;&nbsp;</a></td>
                        </tr>';
            }
            echo    '</table>
                  </center>';
          ?>          
          </form>
          <br>
        </div>
        <div class="col-sm-2 sidenav">
          
        </div>
      </div> 
    </div>

    <script>
      function confirmacion_borrar(link, nombre) {
        if ( confirm("Desea eliminar esta pregunta???") )
          window.location.href = link;
      }
      </script>

    <footer class="container-fluid text-center">
      <img src="img/logo_fa.png"><br><br>
      <p>© Todos los Derechos Reservados <a href="http://www.fundacionamparo.com" target="_blank">Fundación Amparo I.A.P.</a></p>
    </footer>
</body>
</html>
<?php }else{
header("Location: index.html");
}?>
















