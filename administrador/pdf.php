<?php 
	require_once('BD.php');	
  $BD= new BD();
  session_start();
  if (isset($_SESSION['user2'])) {
 
  $id=$_GET['claves'];
  $area = $BD->preabiertas($id);
  
  if(isset($_POST['create_pdf'])){
    require_once('tcpdf/tcpdf.php');
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('MA');
    $pdf->SetTitle($_POST['reporte_name']);
	
    $pdf->setPrintHeader(false); 
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(20, 20, 20, false); 
    $pdf->SetAutoPageBreak(true, 20); 
    $pdf->SetFont('Helvetica', '', 10);
    $pdf->addPage();

    $content = '';
    $unico = $BD->mostrarareasID($id);
    
    foreach ($unico as $key) {
      $name = $key['nombre'];
    }
    $content .= '
		  <div class="row">
        <img src="img/fa.png" width="70px" height="70px"/>
       	<div class="col-md-12">
         	<h1 style="text-align:center;">REPORTE DE PREGUNTAS DE '.$name.'</h1>
          <table border="1" cellpadding="5">
            <thead>
              <tr>
                <th align="center" bgcolor="#000000" style="color:white"><b>Pregunta</b></th>
                <th align="center" bgcolor="#000000" style="color:white"><b>Empleado</b></th>
                <th align="center" bgcolor="#000000" style="color:white"><b>Respuesta</b></th>
              </tr>
            </thead>';
    foreach ($area as $row ) { 
      $content .= '
        <tr>
          <td align="center">'.$row['Pregunta'].'</td>
          <td align="center">'.$row['empleado'].'</td>
          <td align="center">'.$row['respuesta'].'</td> 
        </tr>';
    }
    $content .= '</table></div></div>';
    $content .= '
		  <div class="row padding">
       	<div class="col-md-12" style="text-align:center;">
          <span>Pdf Creator </span>By MA 
        </div>
      </div>';
	
	  $pdf->writeHTML($content, true, 0, true, 0);
    $pdf->lastPage();
    $pdf->output('res_abiertas_'.$name.'.pdf', 'I');
  }
?>
        
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Exportar a PDF | CLIMA LABORAL ADMINISTRADOR</title>
    <link rel="icon"  href="img/logofa.png">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="css/style.css" rel="stylesheet">-->
  </head>

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
      padding-top: 100px;
      background-color: white;
      height: 100%;
    }
    .panel-danger{
      border-radius:3px;
      position:center;
      padding-right: 35px;
      padding-left: 0;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 20%;
      /*position:center;*/
      padding-top: 20%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      /*padding: auto;*/
    }

    tr:nth-child(even) {
      background-color: #dddddd;
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
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>

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
    
    <div class="container-fluid text-center">    
      <div class="row content">
        <div class="col-sm-2 sidenav">
          <a href="preabierta.php"><input type="button" name="regresar" class="btn btn-primary pull-center" style="width:150px;height:50px" value="Regresar"></a>
        </div>
        <div class="col-sm-8 text-center">
          <div class="row padding"> 
            <div class="col-md-12">
              <?php 
                $unico = $BD->mostrarareasID($id);
                foreach ($unico as $key) {
                  $name = $key['nombre'];
                }
                echo '<center><h3>'.$name.'</h3></center>'
              ?>
            </div>
          </div>
          <div class="row">
            <table class="table">
              <thead>
                <tr>
                  <th align="center">Pregunta</th>
                  <th align="center">Empleado</th>
                  <th align="center">Respuesta</th> 
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($area as $key) {
                ?>
                <tr>
                  <td width="20%"><?php echo $key['Pregunta']; ?></td>
                  <td width="20%"><?php echo $key['empleado']; ?></td>
                  <td width="20%"><?php echo $key['respuesta']; ?></td>
                </tr>
                <?php
                  } 
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm-2 sidenav">
          <form method="post">
            <input type="hidden" name="reporte_name" value="<?php echo $name; ?>">
            <center>
              <input type="submit" name="create_pdf" class="btn btn-danger pull-center" style="width:150px;height:50px" value="Generar PDF">
              <a href="export_excel_Abiertas.php?claves=<?php echo $id; ?> "><input type="button" name="create_pdf" class="btn btn-success pull-center" style="width:150px;height:50px" value="Generar Excel"></a>
            </center>
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
<?php 
}else{
    header("Location: index.html");
}
?>