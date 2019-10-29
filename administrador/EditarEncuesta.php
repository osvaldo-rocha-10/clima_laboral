<?php


require_once 'BD.php';
$BD = new BD();

session_start();
if (isset($_SESSION['user2'])) {
    # code...
$id = $_GET['claves']; // importante saber a quíen vamos a modificar por eso se toma la clave
$cuantos = $BD->ContarPreguntas($id);
$TablaCampos = $BD->MostrarCampos($id); 
$TablaPreguntas = $BD->MostrarPreguntas($id); // nos traemos los datos del usuario del Registro
foreach ($TablaCampos as $row)
{

  $nombre = $row['titulo'];
  $fecha = $row['fecha'];
  
    /*/ obtenemos los datos del registro
  $ponente = $row['Nombre_Ponente'];  // obtenemos los datos del registro$nombre = $row['nombre'];  // obtenemos los datos del registro
  $fecha = $row['Fecha'];  // obtenemos los datos del registro
  $descripcion = $row['Descripcion_Video'];  // obtenemos los datos del registro
  $imagen = $row['Imagen'];*/
}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar Descripción | CLIMA LABORAL ADMINISTRADOR</title>
    <link rel="icon"  href="img/logofa.png">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 80%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
input[type=file], select, textarea {
    width: 80%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
input[type=date], select, textarea {
    width: 80%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}
label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] 
    {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    }
input[type=submit]:hover 
    {
    background-color: red;
    }
.container 
    {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) 
{
    .col-25, .col-75, input[type=submit]
    {
        width: 80%; 
        margin-top: 0; 
    }
}

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
      width: 20%;
      /*position:center;*/
      padding-top: 20%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: center;
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
    
    <div class="container-fluid text-center">    
      <div class="row content">
        <div class="col-sm-2 sidenav">
          <a href="verCampos.php"><input type="button" name="regresar" class="btn btn-primary pull-center" style="width:150px;height:50px" value="Regresar"></a>
        </div>
        <div class="col-sm-8 text-center">
            <br>
            <h4>ACTUALIZAR CAMPO: <?php echo $nombre;?></h4>
            <hr>
            <form method="POST" action="update_campo.php">
                <!--Nombre, Ponente, Fecha, Descripcion, Imagen, Ubicacion-->
                <input type="hidden" required value="<?php echo $id; ?>" name="id" class="txt">
                <input type="hidden" required value="<?php echo $fecha; ?>" name="fecha" class="txt">

                <div class="row">
                    <label>Nombre del Campo</label>
                    <br>
                    <input type="text" required value="<?php echo $nombre; ?>" name="nombre" class="txt">
                </div> 
                <div class="row">
                    <label></label>
                    <br>
                    <p><?php echo $cuantos; ?> Preguntas en este campo (<a href="formularioPreguntas.php?clave=<?php echo $id; ?> &nombre2=<?php echo $nombre?>">Editar las preguntas</a>)</p>
                    <br>
                </div> 
                <div class="row">
                    <label></label>
                    <br>
                    <center>
                        <button class="btn btn-info btn-lg" type="submit" name="actualizar">Actualizar </button>
                    </center>
                    <br>
                </div>                                 
            </form>
        </div>
        <div class="col-sm-2 sidenav">
          
        </div>
      </div> 
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
    });
    </script>

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