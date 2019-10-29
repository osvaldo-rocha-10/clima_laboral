<?php
	require_once 'BD.php';
	$BD = new BD();
	session_start();
	if(isset($_SESSION['work'])){
		$id = $_GET['id'];
		$Preguntas = $BD->MostrarPreguntas($id);
		if ($id == 9) {
			$PreguntasJefe = $BD->MostrarCampos($id);
		}
		else{
			$Campos = $BD->MostrarCampos($id);
			foreach ($Campos as $dato) {
				$idC = $dato['id'];
				$titulo = $dato['titulo'];
				$cantidad = $dato['cantidad'];
				$tipo = $dato['tipo'];
			}
		}

?>

<!DOCTYPE html>
<html>
	<head>
	    <link rel="icon"  href="img/favicon1.ico">
		<meta charset="UTF-8">
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/estilos.css">
		<script src="assets/js/customs.js"></script>
		<title>Encuesta</title>
	</head>

<style type="text/css">
	button {
	    background-color: #585858;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    cursor: pointer;
	    width: 100%;
	}
	textarea{
		min-width: 80%;
		min-height: 10%
	}

	/* The container */
	.container {
	    display: block;
	    position: relative;
	    padding-left: 35px;
	    margin-bottom: 12px;
	    cursor: pointer;
	    font-size: 22px;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	}

	/* Hide the browser's default radio button */
	.container input {
	    position: absolute;
	    opacity: 0;
	    cursor: pointer;
	}

	/* Create a custom radio button */
	.checkmark {
	    position: absolute;
	    top: 0;
	    left: 0;
	    height: 25px;
	    width: 25px;
	    background-color: #BDBDBD;
	    border-radius: 50%;
	}

	/* On mouse-over, add a grey background color */
	.container:hover input ~ .checkmark {
	    background-color: #ccc;
	}

	/* When the radio button is checked, add a blue background */
	.container input:checked ~ .checkmark {
	    background-color: #FA8258;
	}

	/* Create the indicator (the dot/circle - hidden when not checked) */
	.checkmark:after {
	    content: "";
	    position: absolute;
	    display: none;
	}

	/* Show the indicator (dot/circle) when checked */
	.container input:checked ~ .checkmark:after {
	    display: block;
	}

	/* Style the indicator (dot/circle) */
	.container .checkmark:after {
	 	top: 9px;
		left: 9px;
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: white;
	}
</style>

<body onload="nobackbutton();">

	<div class="wrap">
		<div class="info">
			<h1>Encuesta</h1>
		</div>
		<div>
			<left>
				<h2>
					<?php 
						if (!isset($titulo)) {
							$id++;
							$total = $BD->TotalDeCampos();
    						$tolerancia = 10;
    						$suma = $total + $tolerancia;

						    if ($suma == $id){
						        header('location: total.php');
						    }
						    else{
						    	header('location: ver.php?id='.$id);
						    }
						}
						else{
							echo $titulo;
						}    						
					?>
				</h2>
			</left>
			<br>
		</div>
		<form action="insert_respuesta.php" class="" method="post">
			<?php
				if ($tipo == 1) {
					$i = 1;
					foreach ($Preguntas as $row) {
						$pregunta = $row['pregunta'];
						$IdPreg = $row['id'];
						echo '<h3><left>&nbsp;&nbsp;'.$row['pregunta'].'<left><br><br></h3>';
			?>
			<div class="" id="<?php echo $i; ?>">
				<label class="container">Siempre
				<input type="radio" name="opcion<?php echo $i; ?>" id="siempre<?php echo $i; ?>" value="1" required /><span class="checkmark"></span></label>
				

				<label class="container">Casi Siempre
				<input type="radio" name="opcion<?php echo $i; ?>" id="casi<?php echo $i; ?>" value="2" required /><span class="checkmark"></span></label>
				
				<label class="container">Algunas Veces
				<input type="radio" name="opcion<?php echo $i; ?>" id="aveces<?php echo $i; ?>" value="3" required /><span class="checkmark"></span></label>

				<label class="container">Casi Nunca
				<input type="radio" name="opcion<?php echo $i; ?>" id="casiN<?php echo $i; ?>" value="4" required /><span class="checkmark"></span></label>

				<label class="container">Nunca
				<input type="radio" name="opcion<?php echo $i; ?>" id="nunca<?php echo $i; ?>" value="5" required /><span class="checkmark"></span></label>
 
										                                     
				<input type="" name="pregunta<?php echo $i; ?>"   required value="<?php echo $pregunta; ?>">
				<input type="" name="IDpregunta<?php echo $i; ?>" required value="<?php echo $IdPreg; ?>">
				<input type="" name="Numero<?php echo $i; ?>"     required value="<?php echo $i; ?>">
			</div>			
		</form>
	</div>

</body>


<?php
}
}

}
else {
	header('Location: index.html');
}
?>