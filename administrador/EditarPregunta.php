<?php


require_once 'BD.php';
$BD = new BD();

session_start();
if (isset($_SESSION['user2'])) {
    # code...

$id = $_GET['claves']; // importante saber a quíen vamos a modificar por eso se toma la clave
$clave = $_GET['clave2'];
$titulo = $_GET['nombre2'];
$pregunta = $BD->MostrarPreguntaUnica($id);

 // nos traemos los datos del usuario del Registro
foreach ($pregunta as $row)
{

  $nombre = $row['pregunta'];
  $valor = $row['valor'];
  $iden = $row['iden'];
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Actualizar Descripción</title>
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
.col-25 
    {
    float: left;
    width: 10%;
    margin-top: 6px;
    }
.col-75 
    {
    float: left;
    width: 75%;
    margin-top: 6px;
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
</style>
  </head>












  <body>
<center><h4>Actualizar Pregunta</h4>  </center>
  <!--Inicio del FORM-->
  <form method="POST" action="update_pregunta.php">

        <!--Nombre, Ponente, Fecha, Descripcion, Imagen, Ubicacion-->
            <input type="hidden" required value="<?php echo $id; ?>" name="id" class="txt">
            <input type="hidden" required value="<?php echo $clave; ?>" name="clave" class="txt">           
            <input type="hidden" required value="<?php echo $titulo; ?>" name="titulo" class="txt">

              <div class="row">
                <div class="col-25">
                </div>
                <div class="col-75">
                    <label>Pregunta</label><br>
                    
                    <input type="text" required value="<?php echo $nombre; ?>" name="pregunta" class="txt">
                </div>
              </div>  





            <div class="row">
                <div class="col-25">
                </div>
                <div class="col-75">
                    <label></label><br>
                    <center><button class="btn waves-effect waves-light" type="submit" name="actualizar">Actualizar </button></center>
                </div>
              </div>

  </form><!--FIN DEL FORM-->


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
    });
    </script>
  </body>
</html>

<?php
}else{
    header("Location: index.html");
}
?>