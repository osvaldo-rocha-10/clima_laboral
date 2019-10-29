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





<br><br>
<!DOCTYPE html>
<html><head>
        <head>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<title>formulario preguntas</title>
</head>
<style type="text/css">
	

	button {
    background-color: #585858;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}


</style>
<body>
 <body>
	<div class="wrap">

		<div class="info">
			<h1><?php echo $titulo;?></h1>
			
			
		</div>
		<div>
		<form action="insert_respuesta.php" class="formulario" method="POST">
			<?php 

                  echo "<center>
                  <table border=1 > ";
                  
                  echo "<tr> 
                  <td>pregunta</td>  
                  <td></td> 
                  <td></td> 
                  
                   </tr>";
                          
          $id = $_GET['clave'];      									
					$Campos = $BD->MostrarPreguntas($id);

						foreach ($Campos as $row) {
										
                            echo'<tr>';

                            echo '<td width="70%" align="left">'.
                            '<h4>'.$row['pregunta'].'<h4>'.'<td>';
                            


                            //botones de editar y eliminar
                            echo '<td width = "40%">
                            <a href="EditarPregunta.php?claves='. $row['id'] .'&clave2='.$id.'&nombre2='.$titulo.'">
                            Editar
                            </a>&nbsp;&nbsp;&nbsp;


                            <a href="javascript:confirmacion_borrar
                            (\'delete_preguntas.php?clave='. $row['id'] .'&clave2='.$id.'&nombre2='.$titulo.'\', \''. $row['pregunta'] .'\');">Eliminar
                            </a>

                            </td>';

                            
                            



                          }
                ?>         	
		</form>
		</div>
	</div>
    <script>
      function confirmacion_borrar(link, nombre) {
        if ( confirm("Desea eliminar esta pregunta???") )
          window.location.href = link;
      }
      </script>
</body>
</html>
<?php }else{
header("Location: index.html");
}?>
















