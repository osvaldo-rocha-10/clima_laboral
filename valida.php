<?php
require_once 'BD.php';
			$BD = new BD();
			session_start(); 
		    $pass = $_POST['clave'];

$resultado = $BD->validarUsuario($pass);
$empleado = $BD->getEmpleado($pass);
$terminada = $BD->getEncuestaTerminada($pass);

//$preg = $BD->ContarPreguntasTodas();
//$pregXempleado = $BD->ContarRespuestasUsuario($empleado);

if ($resultado != 0) {
 
	if ($terminada == 1) {
		header('location: salida.php');

	}
	elseif ($terminada == 2) {
		header('location: inconclusa.php');

	}
	else{
							$_SESSION['work'] = $pass;
							$_SESSION['area'] = $BD->getArea($pass);
							$_SESSION['comprobacion'] = 0;
							$_SESSION['empleado'] = $empleado;
							$Campos = $BD->MostrarCamposTodos();
							$i = 1;
							foreach ($Campos as $key) {
								$array[$i] = $key['id'];
								$i++;
							}
					$id = $array[1];  
					header('location: bienvenida.php?id='.$id);

	}


	
}
else
{
    
header("Location: index.html");
}
?>


















