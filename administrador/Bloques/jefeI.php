<?php 
    require_once 'BD.php';  //para incluir la clase que maneja la BD
  $BD = new BD();
  $sSatisfecho = 0;
  $sNeutro = 0;
  $sInsatisfecho = 0;
  $conSatisfecho= 0;
  $conNeutro = 0 ;
  $conInsatisfecho = 0;

  session_start();
  if (isset($_SESSION['user2'])) {
    # code...
  
?>
<!DOCTYPE html>
<html lang="en" >
<link rel="icon"  href="logofa.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
<style type="text/css">   
.h{
  color: orange;
  }

html {
  background-color:  #CBC3BF;
}

  </style>
  <meta charset="UTF-8">
  <title>Graficas | CLIMA LABORAL ADMINISTRADOR</title>
  
  
  
  
  
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
     color :'#1F8449',
    data:  [
    <?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = $array2[1];

    while ($i <= $total) {
$cantidad = $BD->ExistenciaDePregunta($id2);
if ($cantidad == 1) {
    $array[$i] = $BD->ContarRespuestasSatisfecho2($id2, $id);

     if ($array[$i]!=0){
         $conSatisfecho++; 
    }

    $respuestas = $BD->ContarRespuestas($id2, $id);
    if ($respuestas!=0) {
    $porcentaje = round((($array[$i] / $respuestas) * 100), 2);
      $sSatisfecho +=$porcentaje;
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      else{
        ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      }
    
else{$id2++;}
      }
  $sSatisfecho = $sSatisfecho/$conSatisfecho;
  $sSatisfecho= round($sSatisfecho,2);
   ?>
  
    ]

  }, {
    name: 'Neutral',
	color : '#4a86af',
    data: [
    
    <?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = $array2[1];

    while ($i <= $total) {
$cantidad = $BD->ExistenciaDePregunta($id2);
if ($cantidad == 1) {
    $array[$i] = $BD->ContarRespuestasNeutro($id2, $id);
    if ($array[$i]!=0){
         $conNeutro++; 
    }
    $respuestas = $BD->ContarRespuestas($id2, $id);
    if ($respuestas!=0) {
    $porcentaje = round((($array[$i] / $respuestas) * 100), 2);
      $sNeutro=$sNeutro+$porcentaje;
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      else{
        ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      }
    
else{$id2++;}
      } 
   $sNeutro= $sNeutro/$conNeutro;
   $sNeutro = round($sNeutro,2);

  ?>
  
    
    ]

  }, {
    name: 'Insatisfecho',
	color: '#C0392B',
    data: [
    <?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = $array2[1];

   while ($i <= $total) {
$cantidad = $BD->ExistenciaDePregunta($id2);
if ($cantidad == 1) {
    $array[$i] = $BD->ContarRespuestasInsatisfecho($id2, $id);
     if ($array[$i]!=0){
         $conInsatisfecho++;
      }
    $respuestas = $BD->ContarRespuestas($id2, $id);
    if ($respuestas!=0) {
    $porcentaje = round((($array[$i] / $respuestas) * 100), 2);
     $sInsatisfecho+=$porcentaje;
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      else{
        ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
      }
    
else{$id2++;}
      } 
     $sInsatisfecho = $sInsatisfecho/$conInsatisfecho;
     $sInsatisfecho = round($sInsatisfecho,2);
      ?>
  
    ]

  }


  ]
});



    </script>



<br>
 <?php echo ' <center><h1> Porcentaje de Satisfacción: '.$sSatisfecho.'% </h1></center>'; ?>
 <?php echo ' <center><h1> Porcentaje Neutral: '.$sNeutro.'% </h1></center>'; ?>
 <?php echo ' <center><h1> Porcentaje de Insatisfacción: '.$sInsatisfecho.'% </h1></center>'; ?>
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






