<?php
require_once 'BD.php';
			$BD = new BD();
			session_start(); 
			$user = $_POST['username'];
		    $pass = $_POST['clave'];

		$resultado = $BD->validarUsuario($user, $pass);

		if ($resultado != 0) {
			$_SESSION['user2'] = $user; 
			$_SESSION['password'] = $pass;

			header('location: inicio.php'); 
			}
			else
			{
			header("Location: index.html");
			}
?>




















