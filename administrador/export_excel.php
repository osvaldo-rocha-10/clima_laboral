<?php 
require_once 'BD.php';
$BD = new BD();

// headers for exporting excel

header("Content-Disposition: attachment; filename='Todas_las_respuestas_de_todos_los_empleados.xls'");

header("Content-Type:   application/vnd.ms-excel; charset=iso-8859-1");
function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();


$consulta = $BD->preaAllPdf();

$sno = 1;
foreach ($consulta as $row) {
	$NameCampo = $BD->GetCampo($row['campo']);
	$NameArea = $BD->GetArea2($row['area']);
	# code...
$post_list[] = array("Pregunta"=>$row['Pregunta'],  "Empleado"=>$row['empleado'], "Respuestas"=>$row['respuesta'], "Area"=>$NameArea, "Campo"=>$NameCampo, "Jefe/Coordinador"=>$row['id_jefe']);
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