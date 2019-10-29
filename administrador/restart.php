<?php
require_once 'BD.php';
$BD = new BD();

$id = $_GET['clave'];
$BD->EliminarRespuestaID($id);
$BD->ActualizarEncuestaTerminada($id);

header('location: reiniciar.php'); 
?>