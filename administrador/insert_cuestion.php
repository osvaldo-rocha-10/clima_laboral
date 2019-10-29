<?php 
//realizdo por sj
    require_once 'BD.php';  //para incluir la clase que maneja la BD
	$BD = new BD();
	if (isset($_POST['id'])) {
		# code...
		$id = $_POST['id'];
		$titulo = $_POST['titulo'];
		$fecha = $_POST['fecha'];
		$cantidad = $_POST['cantidad'];
		$suma = $_POST['suma'];
		$total = $cantidad + $suma;
		$BD->ActualizarCampo($id, $titulo, $fecha, $total);
		for ($i=1; $i <=$cantidad ; $i++) { 
		    //obtenemos el texto de la pregunta
			$cero = 0;
		    $preg = 'pregunta'.$i;
		    $preguntaFinal = $_POST[$preg];
		    $BD->RegistroPreguntas($preguntaFinal, $cero, $id);}
		    header("Location: verCampos.php");

	}else{

			$titulo = $_POST['titulo'];
			$cantidad=$_POST['cantidad'];
			$tipo =$_POST['tipo'];
			$fecha_actual = date("Y-m-d");



			$BD->RegistroCampo($titulo, $fecha_actual, $cantidad, $tipo);

			$Campos = $BD->ObtenerIdCampo($titulo);

			foreach ($Campos as $row) {
				$id = $row['id'];
			}

			for ($i=1; $i <=$cantidad ; $i++) { 
		    //obtenemos el texto de la pregunta
			$cero = 0;
		    $preg = 'pregunta'.$i;
		    $preguntaFinal = $_POST[$preg];
		    $BD->RegistroPreguntas($preguntaFinal, $cero, $id);}
		    header("Location: verCampos.php");
   }

		

			
	
	
	
?>