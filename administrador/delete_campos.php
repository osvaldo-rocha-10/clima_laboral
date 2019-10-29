<?php
require_once 'BD.php';
$BD = new BD();

$id = $_GET['clave'];
$BD->EliminarCampo($id);
$BD->EliminarPreguntaXCampo($id);
header('location: verCampos.php'); 
?>