<?php 
	require_once('BD.php');	
  $BD= new BD();
 
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
       # code...
      $name = $key['nombre'];
     }
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">'.$name.'</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>Pregunta</th>
            <th>empleado</th>
            <th>respuesta</th>
           
          </tr>
        </thead>
	';
	
	
	foreach ($area as $row ) {
     # code...
   
		 
	$content .= '
		<tr>
            <td>'.$row['Pregunta'].'</td>
            <td>'.$row['empleado'].'</td>
            <td>'.$row['respuesta'].'</td>
           
        </tr>
	';
	}
	
	$content .= '</table>';
	
	$content .= '
		<div class="row padding">
        	<div class="col-md-12" style="text-align:center;">
            	<span>Pdf Creator </span>By MA 
            </div>
        </div>
    	
	';
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('res_abiertas_'.$name.'.pdf', 'I');
}

?>
		 
          
        
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Exportar a PDF </title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>







    <!--fin de barra-->

  <div class="container" >
  <div class="container" >
<div class="container" >
  <div class="container" >
 <div class="container" >
  <div class="container">
    
	<div class="container-fluid">
        <div class="row padding">
        	<div class="col-md-12">
            	<?php $unico = $BD->mostrarareasID($id);
     foreach ($unico as $key) {
       # code...
      $name = $key['nombre'];
     }
            	 echo '<center><h3>'.$name.'</h3></center>'
				?>
            </div>
        </div>
    	<div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Pregunta</th>
            <th>empleado</th>
            <th>respuesta</th>
           
          </tr>
        </thead>
        <tbody>
        <?php 
			foreach ($area as $key) {
        # code...
    ?>
          <tr>
            <td width="20%"><?php echo $key['Pregunta']; ?></td>
            <td width="20%"><?php echo $key['empleado']; ?></td>
            <td width="20%"><?php echo $key['respuesta']; ?></td>
            
          </tr>
         <?php } ?>
        </tbody>
      </table>
              <div class="col-md-12">
              	<form method="post">
                	<input type="hidden" name="reporte_name" value="<?php echo $name; ?>">
                  <center>
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">


                



                  <a href="export_excel_Abiertas.php?claves=<?php echo $id; ?> "><input type="button" name="create_pdf" class="btn btn-success pull-right" value="Generar Excel"></a>
                  </center>


                </form>
              </div>
      	</div>

    </div></div></div></div></div></div></div></div>
    </div>
</body>
</html>