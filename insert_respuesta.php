<?php 
//realizdo por sj
    require_once 'BD.php';  //para incluir la clase que maneja la BD
    $BD = new BD();
    session_start();
    $id = $_POST['id'];
    $area = $_POST['area'];
    $empleado = $_SESSION['empleado'];
    $cantidad = $BD->ContarPreguntas($id);
    $jefe = $_POST['id_jefe'];


    
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
            $clave = 1;
            $dato = "siempre";
            $NumeroPregunta = $array4[$j];
            $idPreguntass = $array3[$j];
            $Preguntaa = $array2[$j];
        }
        else if ($array[$j] == 2) {
            $clave = 2;
            $dato = "casi siempre";
            $NumeroPregunta = $array4[$j];
            $idPreguntass = $array3[$j];
            $Preguntaa = $array2[$j];
        }
        else if ($array[$j] == 3) {
            $clave = 3;
            $dato = "algunas veces";
            $NumeroPregunta = $array4[$j];
            $idPreguntass = $array3[$j];
            $Preguntaa = $array2[$j];
        }
        else if ($array[$j] == 4) {
            $clave = 4;
            $dato = "casi nunca";
            $NumeroPregunta = $array4[$j];
            $idPreguntass = $array3[$j];
            $Preguntaa = $array2[$j];
        }
        else if ($array[$j] == 5) {
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
        $BD->RegistroResultados($dato, $clave, $NumeroPregunta, $idPreguntass, $Preguntaa, $id, $area, $empleado, 0);
        echo $array[$j];
        $j = $j + 1;
    }
    $id++; 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $preg = $BD->ContarPreguntasTodas();

    $respuestas = $BD->ContarRespuestasUsuario($empleado); 
    $respuestasJefe = $BD->ContarRespuestasUsuJefe();
    $pregJefe = $BD->ContarPreguntasJefe();
    $tipo = $BD->SacarTipo($empleado);

    if($tipo == 2){
        //$respuestas = $respuestas - ($respuestasJefe/2);
        $preg = $preg + $pregJefe;                                                                
    }
    if ($tipo == 0) {
        $preg = $preg - $pregJefe;
    }
                                                                   
    if ($respuestas == $preg) {
        $BD->ActualizarEncuestaTerminada($empleado, 1); 
    }
    else
    {
        $BD->ActualizarEncuestaTerminada($empleado, 2); 

    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    header('location: ver.php?id='.$id); 
    

?>