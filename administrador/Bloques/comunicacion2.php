<?php 
    require_once 'BD.php';  //para incluir la clase que maneja la BD
  $BD = new BD();
  session_start();
  if (isset($_SESSION['user2'])) {
    # code...
 
?>
<!DOCTYPE html> 
<html lang="en" >
<link rel="icon"  href="favicon1.ico">
<link rel="icon"  href="logofa.png">

<head>


	<style type="text/css">
		
.h{


	color: orange;
}

html {
  background-color: #CBC3BF;
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






<div id="container" style="min-width: 600px; height: 660px;"></div>
  
  

    <script>
    	<?PHP 
    	$id = $_GET['clave'];
    	$Campos = $BD->MostrarCampos($id);
      $total = $BD->ContarAreas();
		foreach ($Campos as $key) {
		  # code...
		  $titulo = $key['titulo'];
		}
    	?>
	Highcharts.chart('container', {
  chart: {
    type: 'column'
    
  },
  title: {
    text: '<?php echo $titulo;?>'
  },

  xAxis: {
    categories:[
      <?php 
    $Areas = $BD->MostrarAreasAll();

    foreach ($Areas as $row) {?>

  ['<?php echo $row['nombre']; ?>'], 


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
        color:'green'
      }
    }
  },
  series: [{
    name: 'Satisfecho',
    color :'#1F8449',
    data:  [<?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = 1;

    while ($i <= $total) {

    $array[$i] = $BD->ContarRespuestasSatisfechoAREA($id2, $id);
    $respuestas = $BD->ContarRespuestasAREA($id2, $id);
    if ($respuestas!=0) {$porcentaje = round((($array[$i] / $respuestas) * 100), 2);
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
    else{
      ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;
    }
  } ?>
    
    
  
    ]






    ////////////////////////////////////////////////////

  }, {
    name: 'Neutral',
    color : '#4a86af',
    data:  [<?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = 1;

    while ($i <= $total) {

    $array[$i] = $BD->ContarRespuestasNeutroAREA($id2, $id);
    $respuestas = $BD->ContarRespuestasAREA($id2, $id);
    if ($respuestas!=0) {$porcentaje = round((($array[$i] / $respuestas) * 100), 2);
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
    else{
      ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;
    }
  } ?>
    
  
    ]

  }, {
    name: 'Insatisfecho',
    color: '#C0392B',
    data:  [<?php 
    $i = 1;
    $porcentaje = 0;
    $id2 = 1;

    while ($i <= $total) {

    $array[$i] = $BD->ContarRespuestasInsatisfechoAREA($id2, $id);
    $respuestas = $BD->ContarRespuestasAREA($id2, $id);
    if ($respuestas!=0) {$porcentaje = round((($array[$i] / $respuestas) * 100), 2);
    ?>

      [<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;}
    else{
      ?>[<?php echo $porcentaje; ?>],<?php 
      $i++;$id2++;
    }
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