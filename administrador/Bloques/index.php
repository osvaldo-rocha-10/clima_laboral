<?php 
require_once 'BD.php';
$BD = new BD();
?>
<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
</head>
<body>


	<?php 
	$Campos = $BD->MostrarCamposAll();

	foreach ($Campos as $dato) {
		$idC = $dato['id'];
		$titulo = $dato['titulo'];
		$fecha = $dato['fecha'];
		$cantidad = $dato['cantidad'];
		$tipo = $dato['tipo'];
		if ($tipo == 1) {
			
		echo '<a href = "jefeI.php?clave='.$idC.'">'.$titulo .'<br>';				
			
		}
		
	}
?>

</body>
</html>





























































