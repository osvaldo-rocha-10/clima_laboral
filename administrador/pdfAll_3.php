<?php 
	require_once('BD.php');	
  $BD= new BD();
   $respuesta = $BD->preaAllPdf();

	
if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('FA');
	$pdf->SetTitle($_POST['reporte_name']);
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	
	$content .= '
		<div class="row">
      <div class="col-md-12">
       	<h1 style="text-align:center;">RESPUESTAS DEL CLIMA LABORAL</h1> 	
        <table border="1" cellpadding="5">
          <thead>
            <tr>
              <th align="center">Pregunta</th>
              <th align="center">Empleado</th>
              <th align="center">Respuesta</th>
              <th align="center">Campo</th> 
            </tr>
          </thead>';
	
	foreach ($respuesta as $row ) {

	$content .= '
		<tr>
      <td align="center">'.$row['Pregunta'].'</td>
      <td align="center">'.$row['empleado'].'</td>
      <td align="center">'.$row['respuesta'].'</td>
      <td align="center">'.$row['campo'].'</td>
    </tr>';
	}
	
	$content .= '</table>';
	
	$content .= '
		<div class="row padding">
      <div class="col-md-12" style="text-align:center;">
       	<span>Pdf Creator </span>By MA 
      </div>
    </div>';
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Todas_las_respuestas_de_todos_los_empleados.pdf', 'I');
}

?>
		 
          
        
<!--<!doctype html>
<html lang="es">
    <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reiniciar Todo | CLIMA LABORAL</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Menu Clima Laboral" />
    <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

 
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />


    

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/icomoon.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/style.css">

    
    <script src="js/modernizr-2.6.2.min.js"></script>

<style type="text/css">
    html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
    }

    #full-screen-background-image {
        z-index: -999;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 200;
    }


    #fondo{
/*background-color: orange;*/

       
    }
</style>-->

<!DOCTYPE html>
 <html>
  <head>
    <title>Respuestas Todas | CLIMA LABORAL ADMINISTRADOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="icon"  href="img/logofa.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: black;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 50px;
      background-color: white;
      height: 120%;

    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #20211F;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 30px;
      }
      .row.content {height:auto;} 
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 50%;
      /*position:center;
      padding-left: 20%;*/
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      /*padding: auto;*/
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

  </style>

    </head>

<body>

    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="inicio.php"><h5>FUNDACIÓN AMPARO</h5></a><img src="img/amparo.png" width="45px" height="45px">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="crearEncuesta.php">Crear Preguntas</a></li>
        <li><a href="verCampos.php">Ver Campos</a></li>
        <li><a href="faltantes.php">Faltantes</a></li>
        <li><a href="preabierta.php">Preguntas Abiertas</a></li>
        <li><a href="reiniciar.php">Reiniciar  Encuesta</a></li>
        <li><a href="Bloques/index2.php">Ver Graficas</a></li>
        <li><a href="pdfAll.php">Respuestas Todas</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> SALIR</a></li>
      </ul>
    </div>
  </div>
</nav>

<body>

    <div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-2 sidenav">
        <!--<p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>-->
      </div>
      <div class="col-sm-8 text-center"> 
        <h2>Respuestas del clima laboral</h2>
        <br>
        <div class="row">
          <center>
            <table>
                <thead>
                  <tr>
                    <th>Pregunta</th>
                    <th>Empleado</th>
                    <th>Respuesta</th>
                    <th>Campo</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php 
                    foreach ($respuesta as $key) {
                  ?>
                  <tr>
                    <td ><?php echo $key['Pregunta']; ?></td>
                    <td ><?php echo $key['empleado']; ?></td>
                    <td ><?php echo $key['respuesta']; ?></td>
                    <td ><?php echo $key['campo']; ?></td>
                  </tr>
                  <?php 
                    } 
                  ?>
                </tbody>
            </table>
          </center>  
        </div>      
      </div>
      <div class="col-sm-2 sidenav">
        <form method="post">
          <input type="hidden" name="reporte_name" value="todo">
          <input type="submit" href="export_excel.php" name="create_pdf" class="btn btn-danger pull-center" style="width:150px;height:50px" value="Generar PDF">
          <br><br><br><br>
          <a href="export_excel.php"><input type="button" name="create_pdf" class="btn btn-success pull-center" style="width:150px;height:50px" value="Generar Excel"></a>
        </form>
      </div>
    </div> 
  </div>

<footer class="container-fluid text-center">
  <img src="img/logo_fa.png"><br><br>
  <p>© Todos los Derechos Reservados <a href="http://www.fundacionamparo.com" target="_blank">Fundación Amparo I.A.P.</a></p>
</footer>


</body>
</html>