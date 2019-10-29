<?php 
    require_once 'BD.php';  //para incluir la clase que maneja la BD
  $BD = new BD();
  session_start();
  if (isset($_SESSION['user2'])) {
    # code...
    $area = $_GET['area'];
?>
<!DOCTYPE html>
<html lang="en" >
<link rel="icon"  href="favicon1.ico">

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
    name: 'Siempre',
    
    data: [
    <?php 

    $cantidad = $BD->TotalDeCamposTipo();

    $id2 = 1;
    $i = 1;
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
                        if ($respuestas != 0) {$porcentaje = round((($res / $respuestas) * 100), 2);
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
      } ?>
  
    ],
    pointPlacement: 'on'
  }, 
  
  ]

});


  
</script>


</body>

</html>
<?php 
}else{
  header("Location: ../index.html");
}
?>