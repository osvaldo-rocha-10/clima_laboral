<?php
session_start();

if (isset($_SESSION['work'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Finalizado</title>
  <meta charset="utf-8">
  <link rel="icon"  href="img/favicon1.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="assets/js/customs.js"></script>
</head>
<body onload="nobackbutton();">

<div class="container">
  <h2>Encuesta finalizada.</h2>
  <p></p>
  <div class="alert alert-success">
    <strong>Felicidades!</strong> Dá click en Finalizar para salir <a href="iniciarEncuesta.php?termino=1" class="alert-link">  &nbsp;....FINALIZAR</a>.
  </div>
  

</body>
</html>
<?php 
}else{

  header("Location: index.html"); 
}
?>


