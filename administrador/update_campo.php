<?php
require_once 'BD.php';
$BD = new BD();

$id = $_POST['id'];
$titulo = $_POST['nombre'];

$BD->ActualizarCamposki($id, $titulo);
header('location: verCampos.php'); 
?>