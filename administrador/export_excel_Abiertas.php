<?php 
require_once 'BD.php';
$BD = new BD();
  $id=$_GET['claves'];
// headers for exporting excel
$unico = $BD->mostrarareasID($id);
     foreach ($unico as $key) {
       # code...
      $name = $key['nombre'];
     }
header("Content-Disposition: attachment; filename='res_abiertas_".$name.".xls'");

header("Content-Type:   application/vnd.ms-excel; charset=iso-8859-1");
function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();


$consulta = $BD->preabiertas($id);

$sno = 1;
foreach ($consulta as $row) {
	# code...
$post_list[] = array("Pregunta"=>$row['Pregunta'],  "Empleado"=>$row['empleado'], "Respuestas"=>$row['respuesta']);
		$sno++;
}
	



$title_flag = false;
foreach($post_list as $post) {
	if(!$title_flag) {
		// Showing column names 
		echo utf8_decode(implode("\t", array_keys($post)) . "\n");
		$title_flag = true;
	}
	// data filtering
	array_walk($post, 'dataFilter');
	echo utf8_decode(implode("\t", array_values($post)) . "\n");

}

?>