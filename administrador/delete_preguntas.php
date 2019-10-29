<?php
require_once 'BD.php';
$BD = new BD();

$id = $_GET['clave'];
$clave = $_GET['clave2'];
$titulo = $_GET['nombre2'];
$BD->EliminarPregunta($id);
header('location: formularioPreguntas.php?clave='.$clave.'&nombre2='.$titulo); 
?>