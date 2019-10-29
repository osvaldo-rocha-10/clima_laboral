<?php
require_once 'BD.php';
$BD = new BD();

//$id = $_GET['clave'];
$BD->EliminarRespuestas();
$BD->ActualizarEncuestaReiniciada();  

header('location: reniciarAll.php'); 
?>