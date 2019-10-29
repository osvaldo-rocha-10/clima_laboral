<?php
session_start();
if (isset($_SESSION['work'])) {

$id=$_GET['id']; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>INTRODUCCION</title>
  <meta charset="utf-8">
  <link rel="icon"  href="img/favicon1.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="assets/js/customs.js"></script>
</head>
 <body onload="nobackbutton();">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<center>
 <H1>INTRODUCCION</H1>
  <P>BIENVENIDO A ENCUESTA CLIMA LABORAL</P><BR>
	<P> 
		La presente encuesta tiene como objetivo conocer tu sentir, percepción y tu experiencia dentro de la Fundación Amparo y detectar áreas de oportunidad dentro de la institución para su mejora.

			Por favor responde a cada reactivo de manera honesta.

			SUS RESPUESTAS SON 100% CONFIDENCIALES

				Gracias por tu apoyo y participación

				<BR><BR>

				Instrucciones:

			Lee cuidadosamente las siguientes afirmaciones.

			Para cada oración selecciona la respuesta que consideres más se acerque a tu realidad.

			En las preguntas abiertas puedes expresar tu opinión con plena libertad sabiendo que cuidamos la confidencialidad de tus respuestas.
	</P><BR>

  
<form method="get" action="ver.php">
<input type="hidden" name="id" required value="<?php echo $id;?>"/>
<input type="submit" class="btn-danger" name="name" value="INICIAR ENCUESTA">
</form>
</center>
</body>
</html>
<?php
}else{

	header("Location: index.html");
}?>