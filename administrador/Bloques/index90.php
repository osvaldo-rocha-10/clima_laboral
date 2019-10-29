
<?php 
    require_once 'BD.php';  //para incluir la clase que maneja la BD
  $BD = new BD();
     $sumg=0;
      $ne= 0;
      $ins = 0;
  session_start();
  if (isset($_SESSION['user2'])) {
    # code...
    $area = $_GET['area'];
?>
<!DOCTYPE html>
<html lang="en" >
<link rel="icon"  href="logofa.png">

<head>
  <meta charset="UTF-8">
  <title> Clima Laboral
  </title>
  
  
  
  
  
</head>

<body background="  #800000">

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!--<script src="https://code.highcharts.com/modules/export-data.js"></script>-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="container" style="min-width: 1200px; max-width: 2200px; height: 500px; "></div>
  
  

    <script  src="js/index.js"></script>

<script type="text/javascript">

Highcharts.chart('container', {

  chart: {
    polar: true,
    type: 'line'

  },

  title: {

    text: 'Resultados generales',
    x: -550
  },



  xAxis: {
    categories: [
      <?php 
    $Campos = $BD->MostrarCamposss();

    foreach ($Campos as $row) {?>

  ['<?php echo $row['titulo']; ?>'], 


  <?php } ?>
    ],
    tickmarkPlacement: 'on',
    lineWidth: 0
  },

  yAxis: {
    gridLineInterpolation: 'polygon',
    lineWidth: 0,
    min: 0
  },

 
  legend: {
    align: 'right',
    verticalAlign: 'top',
    y: 70,
    layout: 'vertical'
  },

  series: [{
	color: 'green',
    
    data: [
    <?php 

    $cantidad = $BD->TotalDeCamposTipo();

    $id2 = 1;
    $i = 1;
  	$suma=0;
    while ($i <= $cantidad) {
    $existencia = $BD->ExistenciaDeCampo($id2);

    if ($existencia != 0) {
      $Tipos = $BD->VerificarTipo($id2);
      foreach ($Tipos as $key) {
        # code...
        $tipo = $key['tipo'];
      }
      if ($tipo == 1) {

      
                        $res = $BD->ContarRespuestasSatisfechoGENERAL_A($id2, $area);
                        $respuestas = $BD->ContarRespuestasGENERAL_A($id2, $area);
                        if ($respuestas != 0) {
							$porcentaje = round((($res / $respuestas) * 100), 2);
							 $suma = $suma+$porcentaje;
                        ?>

                          [<?php echo $porcentaje; ?>],<?php 
                        
                          $id2++;$i++;}
                        else{
                          ?>

                          [<?php echo $res; ?>],<?php 
                        
                          $id2++;$i++;

                        }
                        
                      }
      else{
          $id2++;
      }
      }
      else{$id2++;}
      }
       $sumg=$suma/10;
       $sumg = round($sumg,2);
       ?>
  
    ],
	  name: "Satisfecho" ,
    pointPlacement: 'on'
  },
  {
    color: '#4a86af',
    data: [
    <?php 

    $cantidad = $BD->TotalDeCamposTipo();
    $id2 = 1;
    $i = 1;
  $suma=0;
 while ($i <= $cantidad) {
    $existencia = $BD->ExistenciaDeCampo($id2);
    
    if ($existencia != 0) {
      $Tipos = $BD->VerificarTipo($id2);
      foreach ($Tipos as $key) {
        $tipo = $key['tipo'];
      }
      if ($tipo == 1) {

      
                        $res = $BD->ContarRespuestasNeutroGENERAL_A($id2,$area);
                        $respuestas = $BD->ContarRespuestasGENERAL_A($id2,$area);
                        if ($respuestas != 0) {
                            $porcentaje = round((($res / $respuestas) * 100), 2);
                              $suma = $suma+$porcentaje;
                        ?>
                           
                          [<?php 
              echo $porcentaje; 
              ?>],<?php 
                        
                          $id2++;$i++;}
                        else{
                          ?>

                          [<?php echo $res; ?>],<?php 
                        
                          $id2++;$i++;

                        }
                        
                      }
      else{
          $id2++;
      }
      }
      else{$id2++;}
      }
      $ne=$suma/10;
      $ne= round($ne,2);
    ?>
  
    ],
    name: "Neutral" ,
    pointPlacement: 'on'
  
  },
  {
    color: '#C0392B',
    data: [
    <?php 

    $cantidad = $BD->TotalDeCamposTipo();
    $id2 = 1;
    $i = 1;
  $suma=0;
 while ($i <= $cantidad) {
    $existencia = $BD->ExistenciaDeCampo($id2);
    
    if ($existencia != 0) {
      $Tipos = $BD->VerificarTipo($id2);
      foreach ($Tipos as $key) {
        $tipo = $key['tipo'];
      }
      if ($tipo == 1) {

      
                        $res = $BD->ContarRespuestasInsatisfechoGENERAL_A($id2,$area);
                        $respuestas = $BD->ContarRespuestasGENERAL_A($id2,$area);
                        if ($respuestas != 0) {
                            $porcentaje = round((($res / $respuestas) * 100), 2);
                              $suma = $suma+$porcentaje;
                        ?>
                           
                          [<?php 
              echo $porcentaje; 
              ?>],<?php 
                        
                          $id2++;$i++;}
                        else{
                          ?>

                          [<?php echo $res; ?>],<?php 
                        
                          $id2++;$i++;

                        }
                        
                      }
      else{
          $id2++;
      }
      }
      else{$id2++;}
      }
      $ins=$suma/10;
      $ins= round($ins,2);
    ?>
  
    ],
    name: "Insatisfecho" ,
    pointPlacement: 'on'
  
  },   
  
  ]

});


  
</script>
<br>
 <?php echo ' <center><h1> Porcentaje de Satisfacción: '.$sumg.'% </h1></center>'; ?>
  <?php echo ' <center><h1> Porcentaje Neutral: '.$ne.'% </h1></center>'; ?>
 <?php echo ' <center><h1> Porcentaje de Insatisfacción: '.$ins.'% </h1></center>'; ?>
 <br>
 <center>
  <div>
          <a href="index2.php"><input type="button" name="regresar" class="btn btn-primary pull-center" style="width:150px;height:50px" value="Regresar"></a>
   </div>
  </center>
  <br>

</body>

</html>
<?php 
}else{
  header("Location: ../index.html");
}
?>