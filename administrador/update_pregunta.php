<?php
require_once 'BD.php';
$BD = new BD();

$id = $_POST['id'];
$pregunta = $_POST['pregunta'];
$clave = $_POST['clave'];
$titulo = $_POST['titulo'];

$BD->ActualizarPregunta($id, $pregunta);
header('location: formularioPreguntas.php?clave='.$clave.'&nombre2='.$titulo); 
?>