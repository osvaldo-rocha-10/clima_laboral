<?php 
//realizdo por sj
    require_once 'BD.php';  //para incluir la clase que maneja la BD
    $BD = new BD();
    session_start();
    $id = $_POST['id'];
    $area = $_POST['area'];
    $empleado = $_SESSION['empleado'];
    $cantidad = $BD->ContarPreguntas($id);
    $idJefe = $BD->GetJefe($empleado);


    
                    $i = 1;
            while ($i <= $cantidad) {
                $res = 'opcion'.$i;
                $respuesta = $_POST[$res];
                $array[$i] = $respuesta;

                $preg = 'pregunta'.$i;
                $pregunta = $_POST[$preg];
                $array2[$i] = $pregunta;

                $iden = 'IDpregunta'.$i;
                $IDpregunta = $_POST[$iden];
                $array3[$i] = $IDpregunta;                

                $nume = 'Numero'.$i;
                $Numero = $_POST[$nume];
                $array4[$i] = $Numero;

                $i = $i + 1;
            }
                                                    $j = 1;
                                                    $dato = "";
                                                    while ($j <= $cantidad) {
                                                                if ($array[$j] == 1) {
                                                                    # code...

                                                                    $clave = 1;
                                                                    $dato = "siempre";
                                                                    $NumeroPregunta = $array4[$j];
                                                                    $idPreguntass = $array3[$j];
                                                                    $Preguntaa = $array2[$j];
                                                                }
                                                                else if ($array[$j] == 2) {
                                                                    # code...
                                                                    $clave = 2;
                                                                    $dato = "casi siempre";
                                                                    $NumeroPregunta = $array4[$j];
                                                                    $idPreguntass = $array3[$j];
                                                                    $Preguntaa = $array2[$j];
                                                                }else if ($array[$j] == 3) {
                                                                    # code...
                                                                    $clave = 3;
                                                                    $dato = "algunas veces";
                                                                    $NumeroPregunta = $array4[$j];
                                                                    $idPreguntass = $array3[$j];
                                                                    $Preguntaa = $array2[$j];
                                                                }else if ($array[$j] == 4) {
                                                                    # code...
                                                                    $clave = 4;
                                                                    $dato = "casi nunca";
                                                                    $NumeroPregunta = $array4[$j];
                                                                    $idPreguntass = $array3[$j];
                                                                    $Preguntaa = $array2[$j];
                                                                }else if ($array[$j] == 5) {
                                                                    # code...
                                                                    $clave = 5;
                                                                    $dato = "nunca";
                                                                    $NumeroPregunta = $array4[$j];
                                                                    $idPreguntass = $array3[$j];
                                                                    $Preguntaa = $array2[$j];
                                                                }
                                                                else{
                                                                    $clave = 6;
                                                                    $dato = $array[$j];
                                                                    $NumeroPregunta = $array4[$j];
                                                                    $idPreguntass = $array3[$j];
                                                                    $Preguntaa = $array2[$j];
                                                                }
                                                                $areaJefe = $BD->GetAreaJefe($idJefe);
                                                                $BD->RegistroResultados($dato, $clave, $NumeroPregunta, $idPreguntass, $Preguntaa, $id, $areaJefe, $empleado, $idJefe);
                                                                echo $array[$j];
                                                                    $j = $j + 1;
                                                                }
                                                                $id++; 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$preg = $BD->ContarPreguntasTodas();
$respuestas = $BD->ContarRespuestasUsuario($empleado);

$pregJefe = $BD->ContarPreguntasJefe();
$respuestasJefe = $BD->ContarRespuestasUsuJefe();

$tipo = $BD->SacarTipo($empleado);

if($tipo == 2){
    //$respuestas = $respuestas - ($respuestasJefe/2);
    $preg = $preg + $pregJefe;                                                                
}

    if ($respuestas == $preg) {
        # code...

    $BD->ActualizarEncuestaTerminada($empleado, 1); 

    }
    else
    {
        $BD->ActualizarEncuestaTerminada($empleado, 2); 

    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             header('location: total.php'); 
    

?>