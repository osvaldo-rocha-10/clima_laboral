<?php 
require_once 'BD.php';  //para incluir la clase que maneja la BD
$BD = new BD();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$cadena = $BD->VerificarTipo(13);
print_r($cadena);
/*$id = $_GET['clave'];
$Campos = $BD->MostrarCamposAll();
foreach ($Campos as $row) {
 echo $row['titulo'];
} 
/*
$Campos = $BD->MostrarCampos($id);
$preguntas = $BD->MostrarPreguntas($id);
$i = 1;
foreach ($preguntas as $row) {
  $array2[$i] = $row['id'];
  $i++;
}echo $array2[1];



$i = 1;
    $porcentaje;
    $id2 = 1;

    while ($i <= 12) {

    $array[$i] = $BD->ContarRespuestasNeutroAREA($id2, $id); 
    $respuestas = $BD->ContarRespuestasAREA($id2, $id);
    if ($respuestas != 0) {
      # code...
      $porcentaje = round((($array[$i] / $respuestas) * 100), 2);
    

      echo $porcentaje.'<br>'; 

      
      $i++;$id2++;
    }
    else{
      echo 0;$i++;$id2++;
    }
  } */
    










?>




</body>
</html>