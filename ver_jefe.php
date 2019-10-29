<?php
require_once 'BD.php';  //para incluir la clase que maneja la BD
$BD = new BD();
session_start();
if (isset($_SESSION['work'])) {


$id = 9;						 
									$BD->MostrarPreguntas($id);
									
										# code...
										$Preguntas = $BD->MostrarPreguntas($id);
										
											$PreguntasJefe = $BD->MostrarCampos($id);
											foreach ($PreguntasJefe as $dato) {
												$idC = $dato['id'];
												$titulo = $dato['titulo'];
												$cantidad = $dato['cantidad'];
												$tipo = $dato['tipo'];
											}
								 
?>





<br><br><br><br><br>
<!DOCTYPE html>
<html><head>
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
			<h1>ENCUESTA</h1>
			
			
		</div>
		<div>
				<left><h2><?php 
				if (!isset($titulo)) {
					# code...		

				//$id++;

				
	$total = $BD->TotalDeCampos();
    $tolerancia = 10;
    $suma = $total + $tolerancia;
    
    //if ($suma == $id){
        # code...
        header('location: total.php');
    //}
    //else
    //{header('location: ver_jefe.php?id='.$id);}

					
				
				}
				
				else{

				echo $titulo;}

				?></h2></left><br>
			</div>
			
		<div>







		<form action="insert_respuesta_jefe.php" class="" method="POST">


      <?php if ($tipo == 1) {
			$i = 1;						 
			foreach ($Preguntas as $row) {

				$pregunta = $row['pregunta'];
				$IdPreg = $row['id'];

				echo '<h3><left>&nbsp;&nbsp;'.$row['pregunta'].'<left><br><br></h3>';?>
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
 
										                                     
			<input type="hidden" name="pregunta<?php echo $i; ?>"   required value="<?php echo $pregunta; ?>">
			<input type="hidden" name="IDpregunta<?php echo $i; ?>" required value="<?php echo $IdPreg; ?>">
			<input type="hidden" name="Numero<?php echo $i; ?>"     required value="<?php echo $i; ?>">

			</div>

			
			<?php $i++;} 
			if ($_SESSION['area'] == 1) {
				# code...
				$area = 1;

			}else if ($_SESSION['area'] == 2) {
				# code...
				$area = 2;

			}else if ($_SESSION['area'] == 3) {
				# code...
				$area = 3;

			}else if ($_SESSION['area'] == 4) {
				# code...
				$area = 4;

			}else if ($_SESSION['area'] == 5) {
				# code...
				$area = 5;

			}else if ($_SESSION['area'] == 6) {
				# code...
				$area = 6;

			}else if ($_SESSION['area'] == 7) {
				# code...
				$area = 7;

			}else if ($_SESSION['area'] == 8) {
				# code...
				$area = 8;

			}else if ($_SESSION['area'] == 9) {
				# code...
				$area = 9;

			}else if ($_SESSION['area'] == 10) {
				# code...
				$area = 10;

			}else if ($_SESSION['area'] == 11) {
				# code...
				$area = 11;

			}else if ($_SESSION['area'] == 12) {
				# code...
				$area = 12;

			}else if ($_SESSION['area'] == 13) {
				# code...
				$area = 13;

			}else if ($_SESSION['area'] == 14) {
				# code...
				$area = 14;

			}else if ($_SESSION['area'] == 15) {
				# code...
				$area = 15;

			}
			else{
				# code...
				$area = 16;

			}
			?>

			<input type="hidden" name="cantidad" required value="<?php echo $cantidad; ?>">
			<input type="hidden" name="id" required value="<?php echo $id; ?>">
			<input type="hidden" name="area" required value="<?php echo $area; ?>">



			<div>

				<button type="submit">Siguiente</button>  

			</div>
		<?php } else { 
			$i = 1;						 
			foreach ($Preguntas as $row) {

			echo '<h2><left>'.'&nbsp;&nbsp;'.$row['pregunta'].'<left><br><br></h2>';
			$pregunta = $row['pregunta'];
			$IdPreg = $row['id'];
			?>
			<div>
                <textarea type="text" name="opcion<?php echo $i; ?>" id="siempre<?php echo $i; ?>" 
                required placeholder="Ingrese su respuesta aquí"></textarea><br><br>


             <input      type="hidden" name="pregunta<?php echo $i; ?>"   required value="<?php echo $pregunta; ?>">
			<input type="hidden" name="IDpregunta<?php echo $i; ?>" required value="<?php echo $IdPreg; ?>">
			<input type="hidden" name="Numero<?php echo $i; ?>"     required value="<?php echo $i; ?>">				
			</div>
			<?php $i++;}if ($_SESSION['area'] == 1) {
				# code...
				$area = 1;

			}else if ($_SESSION['area'] == 2) {
				# code...
				$area = 2;

			}else if ($_SESSION['area'] == 3) {
				# code...
				$area = 3;

			}else if ($_SESSION['area'] == 4) {
				# code...
				$area = 4;

			}else if ($_SESSION['area'] == 5) {
				# code...
				$area = 5;

			}else if ($_SESSION['area'] == 6) {
				# code...
				$area = 6;

			}else if ($_SESSION['area'] == 7) {
				# code...
				$area = 7;

			}else if ($_SESSION['area'] == 8) {
				# code...
				$area = 8;

			}else if ($_SESSION['area'] == 9) {
				# code...
				$area = 9;

			}else if ($_SESSION['area'] == 10) {
				# code...
				$area = 10;

			}else if ($_SESSION['area'] == 11) {
				# code...
				$area = 11;

			}else if ($_SESSION['area'] == 12) {
				# code...
				$area = 12;

			}else if ($_SESSION['area'] == 13) {
				# code...
				$area = 13;

			}else if ($_SESSION['area'] == 14) {
				# code...
				$area = 14;

			}else if ($_SESSION['area'] == 15) {
				# code...
				$area = 15;

			}
			else{
				# code...
				$area = 16;

			}?>

			<input type="hidden" name="cantidad" required value="<?php echo $cantidad; ?>">
			<input type="hidden" name="id" required value="<?php echo $id; ?>">
			<input type="hidden" name="area" required value="<?php echo $area; ?>">



			<div>

				<button type="submit">Siguiente</button>  

			</div>



<script type="text/javascript">
	
</script>



		<?php } ?>
		</form>





<script type="text/javascript">
import("js/sweetalert.min.js");
import("ttps://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js");
import("https://unpkg.com/sweetalert/dist/sweetalert.min.js");
import("js/bootstrap.min.js");
import("valid.js");
function hey()
{
     swal({
							  title: "Deseas cambiar alguna respuesta?",
							  text: "Una vez que continues no podras regresar",
							  icon: "warning",
							  buttons:  ["Si, CORREGIR!", "No, deseo CONTINUAR!"],
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
							    swal("Good job!", "You clicked the button!", "success");
							     
							    window.location.href = 'registrar.php';
							  } else {
							    swal("Corrige alguna respuesta!");
							    
							  }
							});


			return false;






 }
</script>

















		</div>
	</div>
</body>
</html>
<?php 
}else{

  header("Location: index.html");	
}
?>