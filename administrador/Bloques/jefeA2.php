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
<style type="text/css">   
.h{
  color: orange;
  }

html {
  background-color: orange;
}

  </style>
  <meta charset="UTF-8">
  <title>Clima Laboral</title>
  
  
  
  
  
</head>

<body>

<div  id="h"></div>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<!--CODIGO PHP-->
<?php 
$id = $_GET['clave'];
$i = 0;
$Campos = $BD->MostrarCampos($id);
$total = $BD->ContarPreguntas($id);

foreach ($Campos as $key) {
  # code...
  $titulo = $key['titulo'];
}
$preguntas = $BD->MostrarPreguntas($id);

$x = 1;
foreach ($preguntas as $row) {
  $array2[$x] = $row['id'];
  $x++;
}
?>
 


<script src="https://code.highcharts.com/highcharts.src.js"></script>


<div id="container" style="min-width: 600px; height: 660px;"></div>
  
  

    <script>

      Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: '<?php echo $titulo; ?>'
  },

  xAxis: {





    
  categories:[
  <?php 
    $Preguntas = $BD->MostrarPreguntas($id);

    foreach ($Preguntas as $row) {?>

  ['<?php echo $row['pregunta']; ?>'],


  <?php } ?>
  ],









    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Promedio'
    }
  },
 tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
   pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: .0,
      dataLabels:{

        enabled:true,
        color:'blue'
      }
    }
  },
  series: [{
    name: 'Satisfecho',
    
 
    data:  [
    <?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = $array2[1];

    while ($i <= $total) {
$cantidad = $BD->ExistenciaDePregunta($id2);
if ($cantidad == 1) {
    $array[$i] = $BD->ContarRespuestasSatisfechoA($id2, $id, $area);
    $respuestas = $BD->ContarRespuestasA($id2, $id, $area);
    if ($respuestas!=0) {
    $porcentaje = round((($array[$i] / $respuestas) * 100), 2);
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      else{
        ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      }
    
else{$id2++;}
      } ?>
  
    ]

  }, {
    name: 'Neutro',
    data: [
    
    <?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = $array2[1];

    while ($i <= $total) {
$cantidad = $BD->ExistenciaDePregunta($id2);
if ($cantidad == 1) {
    $array[$i] = $BD->ContarRespuestasNeutroA($id2, $id, $area);
    $respuestas = $BD->ContarRespuestasA($id2, $id, $area);
    if ($respuestas!=0) {
    $porcentaje = round((($array[$i] / $respuestas) * 100), 2);
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      else{
        ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      }
    
else{$id2++;}
      } ?>
  
    
    ]

  }, {
    name: 'Insatisfecho',
    data: [
    <?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = $array2[1];

   while ($i <= $total) {
$cantidad = $BD->ExistenciaDePregunta($id2);
if ($cantidad == 1) {
    $array[$i] = $BD->ContarRespuestasInsatisfechoA($id2, $id, $area);
    $respuestas = $BD->ContarRespuestasA($id2, $id, $area);
    if ($respuestas!=0) {
    $porcentaje = round((($array[$i] / $respuestas) * 100), 2);
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      else{
        ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      }
    
else{$id2++;}
      } ?>
  
    ]

  }


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






