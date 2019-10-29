<?php
 require_once 'BD.php';  
 $BD = new BD();
session_start();
if (isset($_SESSION['work'])) {

   // $id=$_GET['id'];
	$id = 6;
    $empleado = $_SESSION['empleado'];
    $tipo = $BD->SacarTipo($empleado);
    $IDJefe = $BD->GetJefe($empleado);
    $IDCoordi = $BD->GetCoordinador($empleado); 
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Iniciar Encuesta | CLIMA LABORAL</title>
  <link rel="icon"  href="img/logofa.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src="assets/js/customs.js"></script>-->
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
      <img src="img/amparo.png" width="45px" height="45px"><a class="navbar-brand" href="#">FUNDACIÓN AMPARO I.A.P.</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>



   <body onload="nobackbutton();">
    <br>
  	

    <div class="container-fluid text-center">    
      <div class="row content">
        <div class="col-sm-2 sidenav">
          <!--<p><a href="#">Link</a></p>
          <p><a href="#">Link</a></p>-->
        </div>
        <div class="col-sm-8 text-left"> 

          <?php
          if($IDCoordi == 1 || $IDCoordi == 426 || $IDJefe == 1 || $IDJefe == 426){
          /* Si Usuario es Tipo 1, deberá contestar solo 60 preguntas */
           if($tipo == 1){
              if ($IDJefe == 0 ) {
                $nombreCoordi = $BD->GetNombre($IDCoordi);
                $totalresjefe = $BD->ContarRespuestasJefe($empleado, $IDCoordi);
                $RespuestasTotales = $BD->ContarRespuestasUsuario($empleado);
                $RespuestasTotales = $RespuestasTotales - $totalresjefe;

    /*--------------------------------------------------------------------------------------------------------------------*/
                if($totalresjefe == 0 && $RespuestasTotales == 0){
          ?>
          <br><br>
          <div class="alert alert-success text-center">
            <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
          </div>
          <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
          
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi; ?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>              
            </center> 

          <?php
              }
              elseif($RespuestasTotales == 0 && $totalresjefe != 0){
          ?>
          <br><br>
          <div class="alert alert-success text-center">
            <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
          </div>
          <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
             <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
           
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center>
          <?php
              }
              elseif ($RespuestasTotales != 0 && $totalresjefe == 0) {
          ?>
          <br><br>
          <div class="alert alert-success text-center">
            <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
          </div>
          <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>

              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi; ?>" width="350px" height="100px">
              </form>
            </center>

          <?php
              }
              else{
            ?>
              <div class="alert alert-danger text-center">
                <strong>ATENCIÓN!</strong> Ya haz finalizado las encuestas, muchas gracias por tu participación.
              </div>
            <?php
                }

     /*---------------------------------------------------------------------------------------------------------------*/

              }
              /*else{
                $nombreJefe = $BD->GetNombre($IDJefe);
                $totalresjefe = $BD->ContarRespuestasJefe($empleado, $IDJefe);
                $RespuestasTotales = $BD->ContarRespuestasUsuario($empleado);
                $RespuestasTotales = $RespuestasTotales - $totalresjefe;

                if($totalresjefe == 0 && $RespuestasTotales == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
              <p><strong>INSTRUCCIONES:</strong> Responde las encuestas que se te presentan a continuación.</p>
            </div>
            <br><br><br>
            <center>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
              <br>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
            </center> 
          <?php
              }
              elseif ($totalresjefe != 0 && $RespuestasTotales == 0) {
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
              <p><strong>INSTRUCCIONES:</strong> Responde las encuestas que se te presentan a continuación.</p>
            </div>
            <br><br><br>
            <center>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center>
          <?php
              }
              elseif($totalresjefe == 0 && $RespuestasTotales != 0) {
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
              <p><strong>INSTRUCCIONES:</strong> Responde las encuestas que se te presentan a continuación.</p>
            </div>
            <br><br><br>
            <center>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
            </center> 
          <?php 
              }
              else{
          ?>
              <div class="alert alert-danger text-center">
                <strong>ATENCIÓN!</strong> Ya haz finalizado las encuestas, muchas gracias por tu participación.
              </div>
          <?php
              }
		  
            }*/
    /* ---------------------------------------------------------------------------------------------------------- */
           }
           /* Si Usuario es Tipo 2, deberá contestar solo 71 preguntas */
           else if($tipo == 2){
            $nombreJefe = $BD->GetNombre($IDJefe);
            $nombreCoordi = $BD->GetNombre($IDCoordi);
            $totalresjefe = $BD->ContarRespuestasJefe($empleado, $IDJefe);
            $totalrescoordi = $BD->ContarRespuestasJefe($empleado, $IDCoordi);
            $RespuestasTotales = $BD->ContarRespuestasUsuario($empleado);
            $RespuestasTotales = $RespuestasTotales - $totalresjefe - $totalrescoordi;

            if($RespuestasTotales == 0 && $totalresjefe == 0 && $totalrescoordi == 0){
          ?>
            
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              
              <br>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe; ?>" width="350px" height="100px">
              </form>
              <br>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi; ?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
            elseif($RespuestasTotales == 0 && $totalresjefe == 0 && $totalrescoordi != 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe; ?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
            elseif($RespuestasTotales == 0 && $totalresjefe != 0 && $totalrescoordi == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi; ?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales != 0 && $totalresjefe == 0 && $totalrescoordi == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
          </div>
          <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>

              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe; ?>" width="350px" height="100px">
              </form>
              <br>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi; ?>" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales != 0 && $totalresjefe != 0 && $totalrescoordi == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>

              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi; ?>" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales != 0 && $totalresjefe == 0 && $totalrescoordi != 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
           
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>

              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe; ?>" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales == 0 && $totalresjefe != 0 && $totalrescoordi != 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
            else{
          ?>
            <div class="alert alert-danger text-center">
              <strong>ATENCIÓN!</strong> Ya haz finalizado las encuestas, muchas gracias por tu participación.
            </div>            

          <?php
            }
           }
           else{
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <hr.>
            <center>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center>
          <?php
           }
         }
     /*--------------------------------------------------------------------------------------------------------------------------*/

         else{
        

          /* Si Usuario es Tipo 1, deberá contestar solo 60 preguntas */
           if($tipo == 1){
              if ($IDJefe == 0) {
                $nombreCoordi = $BD->GetNombre($IDCoordi);
                $totalresjefe = $BD->ContarRespuestasJefe($empleado, $IDCoordi);
                $RespuestasTotales = $BD->ContarRespuestasUsuario($empleado);
                $RespuestasTotales = $RespuestasTotales - $totalresjefe;

    /*--------------------------------------------------------------------------------------------------------------------*/
                if($totalresjefe == 0 && $RespuestasTotales == 0){
          ?>
          <br><br>
          <div class="alert alert-success text-center">
            <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
          </div>
          <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi;?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 

          <?php
              }
              elseif($RespuestasTotales == 0 && $totalresjefe != 0){
          ?>
          <br><br>
          <div class="alert alert-success text-center">
            <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
          </div>
          <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center>
          <?php
              }
              elseif ($RespuestasTotales != 0 && $totalresjefe == 0) {
          ?>
          <br><br>
          <div class="alert alert-success text-center">
            <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
          </div>
          <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>

              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi;?>" width="350px" height="100px">
              </form>
            </center>

          <?php
              }
              else{
            ?>
              <div class="alert alert-danger text-center">
                <strong>ATENCIÓN!</strong> Ya haz finalizado las encuestas, muchas gracias por tu participación.
              </div>
            <?php
                }

     /*---------------------------------------------------------------------------------------------------------------*/

              }
              else{
                $nombreJefe = $BD->GetNombre($IDJefe);
                $totalresjefe = $BD->ContarRespuestasJefe($empleado, $IDJefe);
                $RespuestasTotales = $BD->ContarRespuestasUsuario($empleado);
                $RespuestasTotales = $RespuestasTotales - $totalresjefe;

                if($totalresjefe == 0 && $RespuestasTotales == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
              }
              elseif ($totalresjefe != 0 && $RespuestasTotales == 0) {
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php">
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center>
          <?php
              }
              elseif($totalresjefe == 0 && $RespuestasTotales != 0) {
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
            </center> 
          <?php 
              }
              else{
          ?>
              <div class="alert alert-danger text-center">
                <strong>ATENCIÓN!</strong> Ya haz finalizado las encuestas, muchas gracias por tu participación.
              </div>
          <?php
              }
      
            }
    /* ---------------------------------------------------------------------------------------------------------- */
           }
           /* Si Usuario es Tipo 2, deberá contestar solo 71 preguntas */
           else if($tipo == 2){
            $nombreJefe = $BD->GetNombre($IDJefe);
            $nombreCoordi = $BD->GetNombre($IDCoordi);
            $totalresjefe = $BD->ContarRespuestasJefe($empleado, $IDJefe);
            $totalrescoordi = $BD->ContarRespuestasJefe($empleado, $IDCoordi);
            $RespuestasTotales = $BD->ContarRespuestasUsuario($empleado);
            $RespuestasTotales = $RespuestasTotales - $totalresjefe - $totalrescoordi;

            if($RespuestasTotales == 0 && $totalresjefe == 0 && $totalrescoordi == 0){
          ?>
            
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
              <br>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi;?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>              
            </center> 
          <?php
            }
            elseif($RespuestasTotales == 0 && $totalresjefe == 0 && $totalrescoordi != 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
              <hr>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
            elseif($RespuestasTotales == 0 && $totalresjefe != 0 && $totalrescoordi == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi;?>" width="350px" height="100px">
              </form>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales != 0 && $totalresjefe == 0 && $totalrescoordi == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
              <br>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi;?>" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales != 0 && $totalresjefe != 0 && $totalrescoordi == 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>

              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_coordinadores.php">
                <input type="hidden" name="id" required value=9 />
                <input id="coordinador" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreCoordi;?>" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales != 0 && $totalresjefe == 0 && $totalrescoordi != 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>

              <h4>Jefe Inmediato</h4>
              <form method="get" action="ver_jefe.php">
                <input type="hidden" name="id" required value=9 />
                <input id="jefe" type="submit" class="btn-danger" name="name" value="EVALUA A <?php echo $nombreJefe;?>" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
          elseif($RespuestasTotales == 0 && $totalresjefe != 0 && $totalrescoordi != 0){
          ?>
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <p><strong>IMPORTANTE:</strong> </p>
            <p align="justify">Contesta conforme el siguiente orden:</p>
            <p align="justify">1.- Evaluación jefe inmediato 
            <p align="justify">Una vez concluida esta sección da click en Finalizar y te regresara al menu inicial para la siguiente evaluación</p>
            <p align="justify">2.- Encuesta General </p>
            <p align="justify">Una vez terminada, recibiras un mensaje de Encuesta Finalizada.</p>  
            <hr>

            <!--<p align="justify">Importante: </p>

            <p align="justify">Lee cuidadosamente las siguientes afirmaciones.</p>

            <p align="justify">Para cada oración, selecciona la respuesta que consideres más se acerque a tu realidad.</p>

            <p align="justify">En las preguntas abiertas puedes expresar tu opinión con plena libertad, sabiendo que cuidamos la confidencialidad de tus respuestas.</p>

            <p align="justify">En caso que por alguna razón se cierre el navegador o salgas de la encuesta, avisa a Recursos Humanos para que te la habilite de nueva cuenta.</p>-->
            <center>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center> 
          <?php
            }
            else{
          ?>
            <div class="alert alert-danger text-center">
              <strong>ATENCIÓN!</strong> Ya haz finalizado las encuestas, muchas gracias por tu participación.
            </div>
                        
          <?php
            }
           }
           else{
          ?>
            <!--<div class="alert alert-danger text-center">
              <strong>ATENCION!</strong> Usted no aplica para evaluación a jefe inmediato.
            </div>-->
            <br><br>
            <div class="alert alert-success text-center">
              <strong>Excelente!</strong> Ahora ya puedes comenzar con la encuesta. Responde de manera honesta.
            </div>
            <center>
              <h4>Encuesta General</h4>
              <form method="get" action="ver.php" >
                <input type="hidden" name="id" required value="<?php echo $id;?>"/>
                <input id="normal" type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA" width="350px" height="100px">
              </form>
            </center>
          <?php
           }

         }
          ?>

          <BR><BR>
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
}?>