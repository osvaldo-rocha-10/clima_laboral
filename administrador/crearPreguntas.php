<?php 
session_start();
if (isset($_SESSION['user2'])) {
    # code...
?>
<br><br><br><br><br>
<!DOCTYPE html>
<html><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CREAR ENCUESTA</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
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
      background-color: #f1f1f1;
      height: 150%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
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

<div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <!--<p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>-->
      </div>
      <div class="col-sm-8 text-center"> 
        <?php
   
  //capturamos las variables que vienen por post
  //
   
  if (isset($_POST['id'])) {
      # code...
    require_once 'BD.php';  //para incluir la clase que maneja la BD
    $BD = new BD();
    $id = $_POST['id'];
    $TablaCampos = $BD->MostrarCampos($id); 
                    foreach ($TablaCampos as $row)
                    {
                      $suma = $row['cantidad']; 
                    }
    $cantidad = $_POST["sum"];
    $campo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    

    ?>
        <div class="container">
                    <div class="container form-top">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                <div class="panel panel-danger">
                                    <div class="panel-body">
        <section id="form">
            <form action="insert_cuestion.php" class="contact_form" method="post">
                <h3>Agregar preguntas a <?php echo $campo; ?></h3>
                <table>
                    <?php

                     //ciclo para recorrer la cantidad de preguntas ingresadas
                    for ($i=1; $i <= $cantidad; $i++) {
                    ?>
                <tr>
                    <td>Pregunta <?php echo $i; ?>&nbsp;
                    <input name="pregunta<?php echo $i; ?>" type="text" size = "50" maxlength="1000">

                </td>
                </tr>
                <?php }?>
                </table><br>

                <input name="titulo" type="hidden" value="<?php echo $campo; ?>">
                <input name="cantidad" type="hidden" value="<?php echo $cantidad; ?>">
                <input name="suma" type="hidden" value="<?php echo $suma; ?>">
                <input name="fecha" type="hidden" value="<?php echo $fecha; ?>">
                <input name="id" type="hidden" value="<?php echo $id; ?>">
                <input class="submit" type="submit" value="Insertar"></input>
                <!--almacenan los datos y se mandan por post a intertarPreguntas-->
            </form>







    <?php 
    
  }else{
    $titulo = $_POST["titulo"];
    $cantidad = $_POST["cantidad"]; 
?>
 <div class="container">
            <div class="container form-top">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                        <div class="panel panel-danger">
                            <div class="panel-body">
<section id="form">
    <form action="insert_cuestion.php" class="contact_form" method="post">
        <h3>Campo <?php echo $titulo; ?></h3>
        <table>
            <?php

             //ciclo para recorrer la cantidad de preguntas ingresadas
            for ($i=1; $i <= $cantidad; $i++) {
            ?>
        <tr>
            <td>Pregunta <?php echo $i; ?>&nbsp;
            <input name="pregunta<?php echo $i; ?>" type="text" size = "50" maxlength="1000">

        </td>
        </tr>
        <?php }?>
                <!--<p>Tipo de preguntas</p>-->
                <input type="radio" name="tipo" id="abierta" value="0">
                <label for="abierta">Preguntas abiertas</label><br>
        
                <input type="radio" name="tipo" id="multiple" value="1">
                <label for="multiple">Preguntas de opción múltiple</label>
        </table><br>
        <input class="submit" type="submit" value="Insertar"></input>
        <!--almacenan los datos y se mandan por post a intertarPreguntas-->
        <input name="titulo" type="hidden" value="<?php echo $titulo; ?>">
        <input name="cantidad" type="hidden" value="<?php echo $cantidad; ?>">
    </form>
<?php 
}
?>
</section>
</div>
</div>
</div>
</div>
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